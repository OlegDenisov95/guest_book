<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('index',['messages'=>$messages]);
    }

    public function store(Request $request)
    {
        $valideated = $this->validate($request,[
            'message'=>'required|max:10000',
            'name'=>'required|max:100',
        ]);


        $file = $request->file('file');
        if (isset($file)) {
            $filename = Str::random(16);
            $file->storeAs('images',  $filename,'public');
            $path = Storage::disk('public')->path('images/'.$filename);
            $img = Image::make($path)->resize(100, 100);
            $img->save($path);
        } else{
            $filename = '';
        }
        Message::create(array_merge($valideated, ['file' => $filename]));
        return redirect()->route('index');
    }


}
