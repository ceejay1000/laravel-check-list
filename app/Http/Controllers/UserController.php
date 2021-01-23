<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index () {

        $data = [
            'name' => 'eli',
            'email' => 'eli@mail.com',
            'password' => 'password'
        ];

        User::create($data);
        // DB::insert('INSERT INTO users (name, email, password) VALUES (?, ?, ?)', ['Emmanuel Oduro', 'pduro@mail.com', 'test2334']);
        // $user = new User();
        // $user = User::all();
        // $user->delete();
        // dd($user);
        return 'Hello World!';
    }

    public function uploadAvatar(Request $request){
        if ($request->hasFile('image')){
           User::uploadAvatar($request->image);
         //  $request->session()->flash("message", "Image uploaded");
           return redirect()->back()->with("message", "Image uploaded");
        }
        //$request->session()->flash("error", "Image not uploaded");
        return redirect()->back()->with("error", "Image not uploaded");
    }

   
}
