<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class HomeController extends Controller
{
    public function index(Request $request){
        $news = News::all();
        return view('welcome',compact('news'));
    }
}
