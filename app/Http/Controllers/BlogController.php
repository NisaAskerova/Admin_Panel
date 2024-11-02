<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogMain; // BlogMain modelini daxil edin

class BlogController extends Controller
{
    // Yeni blog məlumatı saxlamaq
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


    // Mövcud blog məlumatlarını yeniləmək
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

    // BlogMain məlumatını silmək
    public function deleteMainInfo($id)
    {
        $blog = BlogMain::findOrFail($id);

        $blog->delete();

        return response()->json(['message' => 'Main information deleted successfully!'], 200);
    }

    // Bütün blog məlumatlarını almaq
    public function getMainInfo()
    {
        $blogs = BlogMain::all();
        return response()->json($blogs, 200);
    }
}
