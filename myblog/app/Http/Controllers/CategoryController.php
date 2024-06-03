<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getIndex(){
        return view('category/index');
    }

    public function getCreate(){
        return view('category/create');
    }

    public function getShow($id){
        return view('category/show', compact('id'));
    }

    public function getEdit($id){
        return view('category/edit', compact('id'));
    }
}
