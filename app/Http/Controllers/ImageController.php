<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Services\Imgbb;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index(){
        $images = Storage::get('image');
        // dd($images);
        return view('home',compact('images'));
    }

    public function store(ImageRequest $request)
    {
        $image = base64_encode(file_get_contents($request->file('image')));
        $data = array(
            'image'=> $image
        );
        $raw = new Imgbb();

        $dataTampil = $raw->postImage($data);
        // dd($dataTampil);
        session()->put('image',$dataTampil->data->url);


        Storage::disk('local')->put('image', $dataTampil->data->url);
        return redirect()->back()->with('message','Gambar berhasil di upload!');
    }
}
