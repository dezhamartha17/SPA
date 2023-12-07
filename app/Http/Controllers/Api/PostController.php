<?php

namespace App\Http\Controllers\Api;

use App\Models\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        //get posts
        $posts = Image::latest()->paginate(5);

        //return collection of posts as a resource
        return new PostResource(true, 'List Data Posts', $posts);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'url'     => 'required|image|mimes:jpeg,png,jpg,gif,bmp|max:2048',
            'caption'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/images', $image->hashName());

        //create post
        $post = Image::create([
            'url'     => $image->hashName(),
            'caption'     => $request->title,
        ]);

        //return response
        return new PostResource(true, 'Data Post Berhasil Ditambahkan!', $post);
    }
}
