<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
class NewController extends Controller
{
    public function index(Request $request){
        $news = News::all();
        return view('news',compact('news'));
    }

    public function create(){
        return view('form');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move('images', $filename);
            $input['image']= $filename;
        }
        News::create($input);
        return redirect()->route('news.index');
    }

    public function edit($id){
        $new = News::find($id);
        return view('form', compact('new'));
    }

    public function update(Request $request, $id){
        $new = News::findOrFail($id);
        $input = $request->all();
        if ($file = $request->file('image')) {
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move('images', $filename);
            $input['image']= $filename;
        }
        $new->update($input);
        return redirect()->route('news.index');
    }
}
