<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\BlogMain;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function __construct()
    {
        // Only authenticated users with a valid API token can access these actions
        $this->middleware('auth:sanctum')
            ->only(
                [
                    'storeComment', 'viewComment'
                ]
            );
    }
    public function storeMainInfo(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        try {
            $blog = new BlogMain();
            $blog->type = $request->type;
            $blog->title = $request->title;
            $blog->description = $request->description;
            $blog->save();

            return response()->json(['message' => 'Main information added successfully!'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to add main information.'], 500);
        }
    }

    public function updateMainInfo(Request $request, $id)
    {
        $request->validate([
            'type' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $blog = BlogMain::findOrFail($id);
        $blog->type = $request->type ?: $blog->type;
        $blog->title = $request->title ?: $blog->title;
        $blog->description = $request->description ?: $blog->description;
        $blog->save();

        return response()->json(['message' => 'Main information updated successfully!'], 200);
    }

    public function deleteMainInfo($id)
    {
        $blog = BlogMain::findOrFail($id);
        $blog->delete();
        return response()->json(['message' => 'Main information deleted successfully!'], 200);
    }

    public function getMainInfo()
    {
        $blogs = BlogMain::all();
        return response()->json($blogs, 200);
    }

    //////////////////////////////////////////////////////////////////////////////////////////////

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'detail_description' => 'required|string',
            'detail_short_description' => 'required|string',
            'detail_text' => 'required|string',
            'image' => 'required|image|max:2048',
            'date_icon' => 'required|image|max:2048',
            'button_icon' => 'required|image|max:2048',
        ]);

        try {
            $blog = Blog::create([
                'title' => $request->title,
                'detail_description' => $request->detail_description,
                'detail_short_description' => $request->detail_short_description,
                'detail_text' => $request->detail_text,
                'description' => $request->description,
                'image' => $this->uploadFile($request->file('image'), 'images'),
                'date_icon' => $this->uploadFile($request->file('date_icon'), 'icons'),
                'button_icon' => $this->uploadFile($request->file('button_icon'), 'icons'),
            ]);

            return response()->json(['message' => 'Blog created successfully!', 'blog' => $blog], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to create blog.'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'detail_description' => 'nullable|string',
            'detail_short_description' => 'nullable|string',
            'detail_text' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'date_icon' => 'nullable|image|max:2048',
            'button_icon' => 'nullable|image|max:2048',
        ]);

        $blog = Blog::findOrFail($id);

        if ($request->hasFile('image')) {
            $this->deleteFile($blog->image);
            $blog->image = $this->uploadFile($request->file('image'), 'images');
        }

        if ($request->hasFile('date_icon')) {
            $this->deleteFile($blog->date_icon);
            $blog->date_icon = $this->uploadFile($request->file('date_icon'), 'icons');
        }

        if ($request->hasFile('button_icon')) {
            $this->deleteFile($blog->button_icon);
            $blog->button_icon = $this->uploadFile($request->file('button_icon'), 'icons');
        }

        $blog->title = $request->title ?: $blog->title;
        $blog->description = $request->description ?: $blog->description;
        $blog->detail_short_description = $request->detail_short_description ?: $blog->detail_short_description;
        $blog->detail_description = $request->detail_description ?: $blog->detail_description;
        $blog->detail_text = $request->detail_text ?: $blog->detail_text;
        $blog->save();

        return response()->json(['message' => 'Blog updated successfully!', 'blog' => $blog], 200);
    }

    public function uploadFile($file, $directory)
    {
        return $file->store($directory, 'public');
    }

    public function deleteFile($filePath)
    {
        if ($filePath && file_exists(public_path('storage/' . $filePath))) {
            unlink(public_path('storage/' . $filePath));
        }
    }

    public function show()
    {
        // Blogları yaradılma tarixinə görə son tarixdən əvvəlki sıralama ilə alırıq
        $blogs = Blog::orderByDesc('id')->get();
        return response()->json($blogs, 200);
    }
    public function showBlogId($id)
    {
        $blogs = Blog::findOrFail($id);
        return response()->json($blogs, 200);
    }
    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return response()->json(['message' => 'Information deleted successfully!'], 200);
    }

    public function search(Request $request)
    {
        $search = $request->input('search', ''); // Boş ola bilər
        $blogs = Blog::where('title', 'LIKE', "%$search%")
            ->select('id', 'title', 'created_at', 'image') // Lazımlı sütunları seçirik
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($blogs); // JSON formatında qaytarırıq
    }


    public function showLatestBlogs()
    {
        // Ən son 3 blogu götürmək üçün sorğu
        $blogs = Blog::orderByDesc('id')
            ->take(3)
            ->select('id', 'title', 'description', 'image', 'date_icon', 'button_icon', 'created_at')
            ->get();

        // JSON formatında cavab qaytar
        return response()->json($blogs, 200);
    }


    public function storeComment(Request $request, $blogId)
    {
        \Log::info('Received blogId: ' . $blogId);  // blogId-nin dəyərini log edirik
    
        // blog_id yoxlanır
        if (!$blogId) {
            return response()->json(['error' => 'Blog ID tapılmadı'], 400);
        }
    
        // Giriş yoxlanır
        $userId = Auth::id();
        if (!$userId) {
            return response()->json(['error' => 'Giriş tələb olunur'], 401);
        }
    
        // Validasiya
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'comment' => 'required|string',
        ]);
    
        // Şərh əlavə etmək
        Comment::create([
            'blog_id' => $blogId,  // blog_id parametrini burda alırıq
            'user_id' => $userId,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
        ]);
    
        return response()->json(['message' => 'Şərhiniz uğurla əlavə edildi!'], 201);
    }
    


    public function viewComment($blogId)
    {
        $comments = Comment::where('blog_id', $blogId)->get();
        
        if ($comments->isEmpty()) {
            return response()->json(['message' => 'No comments available'], 404);
        }
        
        return response()->json($comments);
    }
    
    
}
