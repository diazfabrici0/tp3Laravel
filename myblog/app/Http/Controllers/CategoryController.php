<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function devolverCategorias()
    {
      $categories = Categorias::where('habilitated', 1)->get();
      return $categories;
    } 
}
