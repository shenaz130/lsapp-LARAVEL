<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $title ='Welcome to Laravel';
       // return view('pages.index');
       return view('pages.index')-> with('title',$title);
    }

    public function about(){
        return view('pages.about');
    }

    public function service(){
        $data = array (
            'title' => 'Services',
            'services' => ['web design', 'BI','DDD','DSA']
        );
        return view('pages.service') -> with ($data);
    }
}
