<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MyPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['posts'] = MyPost::all();
        return response()->json([
            'status' => true,
            'message' => 'All Posts Data',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:jpg,png,jpeg,gif',
            ]
        );

        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation failed',
                'errors' => $validation->errors()->all()
            ], 401);
        }

        $img = $request->image;
        $ext = $img->getClientOriginalExtension();
        $imageName = time() . '.' . $ext;
        $img->move(public_path() . '/uploads', $imageName);

        $post = MyPost::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'post created successfully',
            'post' => $post,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['post'] = MyPost::select([
            'id',
            'title',
            'description',
            'image'
        ])->where(['id' => $id])->get();

        return response()->json([
            'status' => true,
            'message' => 'post retreived successfully',
            'post' => $data,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'description' => 'required',
                'image' => 'mimes:jpg,png,jpeg,gif',
            ]
        );

        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation failed',
                'errors' => $validation->errors()->all()
            ], 401);
        }

        $post = MyPost::select('id', 'image')->where(['id' => $id])->get();

        if ($request->image != '') {
            $path = public_path() . '/uploads';

            if ($post->image != '' && $post->image != null) {
                $old_file = $path . $post->image;
                if (file_exists($old_file)) {
                    unlink($old_file);
                }
            }
            $img = $request->image;
            $ext = $img->getClientOriginalExtention();
            $imageName = time() . '.' . $ext;
            $img->move(public_path() . '/uploads', $imageName);
        } else {
            $imageName = $post->image;
        }



        $post = MyPost::where(['id' => $id])->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'post Updated successfully',
            'post' => $post,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $imagePath = MyPost::select('image')->where('id', $id)->first(); 

        $filePath = public_path('uploads/' . $imagePath->image);

        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $post = MyPost::where('id', $id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'post Deleted successfully',
            'post' => $post,
        ], 200);
    }
}
