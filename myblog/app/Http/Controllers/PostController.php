<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use PhpParser\Node\Expr\AssignOp\Pow;

class PostController extends Controller
{
    public function getIndex(Request $request){
        $category_id = $request->input('category_id');
        
        if ($category_id) {
            // Filtrar posts por la categoría seleccionada
            $posts = Post::where('idCategory', $category_id)->where('habilitated', true)->orderBy('created_at', 'desc')->get();
        } else {
            // Obtener todos los posts si no se selecciona ninguna categoría
            $posts = Post::where('habilitated', true)->orderBy('created_at', 'desc')->get();
        }

        $categories = Categorias::all(); // Obtener todas las categorías
        $users = User::all(); // Obtener todos los usuarios

        return view('posts.index', compact('posts', 'categories', 'users'));
    
    }

    public function getCreate(){
        $objCategory = new CategoryController();
        $colCategories = $objCategory->devolverCategorias();

        return view('posts.create', compact('colCategories'));
    }

    public function store(Request $request){
        $request->validate([
            'titlePost' => 'required|max:100',
            'contentPost' => 'required',
            'idCategory' => 'required|exists:categories,idCategory',
          ], [
            'titlePost.required' => 'El título es obligatorio.',
            'titlePost.max' => 'El título no puede tener mas de 100 caracteres.',
            'contentPost.required' => 'El contenido es obligatorio.',
            'idCategory.required' => 'La categoría es obligatoria.',
            'idCategory.exists' => 'La categoría seleccionada no es válida.',
          ]);
          $post = new Post();
          $post->titlePost = $request->titlePost;
          $post->contentPost = $request->contentPost;
          $post->idCategory = $request->idCategory;
          $post->idUserPoster = Auth::id();
          $post->save();
          return redirect()->route('posts.index')->with('success', 'Post creado con éxito.');
    }

    public function getMyPosts(Request $request){
        $userId = Auth::id();

        $posts = Post::where('idUserPoster', $userId)->where('habilitated', true)->orderBy('created_at', 'desc')->get();
        $users = User::all();
        $categories = Categorias::all();

        return view('posts.myPosts', compact('posts', 'users', 'categories'));

    }

    public function show(Post $post)
    {
        $users = User::all();
        $categories = Categorias::all();

        $post = Post::findOrFail($post->idPost);
         return view('posts.show', compact('post', 'users', 'categories'));
    }

    public function getEdit($id){
        return view('posts/edit', compact('id'));
    }

    public function eliminar($postId){
        $post = Post::findOrFail($postId);
        $post->habilitated = false;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post deshabilitado correctamente');
    }
}
