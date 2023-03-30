<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function uploadpostImage($request, $imagename, $imagepath): ?string
    {
        if (!$request->hasFile($imagename)) {
            return null;
        }

        $image = $request->file($imagename);

        $filename = uniqid() . '.' . $image->getClientOriginalExtension();

        //        $image->storeAs('public/covers', $filename);
        $image->move(public_path($imagepath), $filename,);

        return $filename;
    }

    public function getCategories()
    {
        return Category::all();
    }

    public function getUser()
    {
        return User::all();
    }

    public function getPost(){
        return Post::where('post_status','=','publish')->where('post_type','=','book')->get();
    }
    public function getBook(){
        return Post::find('');
    }

   
}
