<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewController extends Controller
{
    public function index(Request $request){
        return view('news');
    }

    public function create(){
        $code_lang = Language::$codesLang;
        $drm_types = $this->drm_types;
        $maturity_rating = $this->maturity_rating;
        return view('backend.movies.form', compact('code_lang', 'drm_types', 'maturity_rating'));
    }
}
