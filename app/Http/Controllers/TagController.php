<?php
namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();

        return response()->json(['message' => 'Information added successfully!'], 201);
    }

    public function get(){
        $tags = Tag::all();
        return response()->json($tags);
    }
    public function show($id){
        $tags = Tag::findOrFail($id);
        return response()->json($tags);
    }
    
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
        ]);

        $tag = Tag::find($id);
        if ($tag) {
            $tag->name = $request->name;
            $tag->save();
            return response()->json(['message' => 'Tag updated successfully!']);
        } else {
            return response()->json(['message' => 'Tag not found!'], 404);
        }
    }

    public function delete($id){
        $tag = Tag::find($id);
        if ($tag) {
            $tag->delete();
            return response()->json(['message' => 'Tag deleted successfully!']);
        } else {
            return response()->json(['message' => 'Tag not found!'], 404);
        }
    }
    
}
