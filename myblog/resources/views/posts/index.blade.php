<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Posts') }}
            </h2>
            <!-- Formulario de Filtrado -->
            <form method="GET" action="{{ route('posts.index') }}" >
                <div class="flex px-4 ">
                    <select name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-select w-48" id="idCategory" name="idCategory">
                        <option value="">Todas las categorías</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->idCategory }}" {{ request('category_id') == $category->idCategory ? 'selected' : '' }}>
                        {{ $category->nameCategory }}
                        </option>
                        @endforeach
                    </select>
                    <div class="px-4">
                        <button type="submit" class="text-blue-600 font-semibold rounded-full border border-blue-600 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 px-5 py-2">Filtrar</button>
                    </div>
                    <div class="px-4">
                        <button class="text-blue-600 font-semibold rounded-full border border-blue-600 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 px-5 py-2">
                            <a href="{{ route('posts.create')}}"  >Crear un post</a>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <table class="table-auto w-full">
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <div class="bg-white border mb-4 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                    <p class="px-4 py-2 text-xs text-gray-900 dark:text-white text-left">ID Post: {{$post->idPost}}</p>
                                    
                                    @php
                                        $cantUsers = count($users);
                                        $idUserPoster = $post->idUserPoster;
    
                                        for ($i=0; $i < $cantUsers; $i++) { 
                                            $usuario = $users[$i];
    
                                            if ($idUserPoster == $usuario->id) {
                                                $nombreUser = $usuario->name;
    
                                            }
                                        }

                                        $cantCategorias = count($categories);
                                        $idCategoriaPost = $post->idCategory;

                                        for ($i=0; $i < $cantCategorias; $i++) { 
                                            $categoria = $categories[$i];
                                            if($idCategoriaPost == $categoria->idCategory){
                                                $nombreCategory = $categoria->nameCategory;
                                            }
                                        }
                                         
                                    @endphp
                                    <p class="px-4 py-2 text-xs text-gray-900 dark:text-white text-left">{{$nombreCategory}}</p>
                                    <div class=" mb-4 rounded-b-lg">
                                        <p class="px-4 py-2 text-gray-900 dark:text-white text-justify">Usuario: {{ $nombreUser }}</p>
                                        <h1 class="px-4 py-2 uppercase font-bold text-gray-900 dark:text-white text-left text-xl">{{ $post->titlePost }}</h1>
                                        <p class="whitespace-pre px-4 py-2 text-balance text-gray-900 dark:text-white text-justify">{{ $post->contentPost }}</p>
                                        <div class="px-2">
                                            <button class="text-blue-600 font-semibold rounded-full border border-blue-600 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 px-5 py-2">
                                                <a href="{{ route('posts.show', $post) }}" > Ver Post</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                               
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
