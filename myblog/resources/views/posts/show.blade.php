<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post') }}
        </h2>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <table class="table-auto w-full">
                    <tbody>
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
                                        <h1 class=" px-4 py-2 uppercase font-bold text-gray-900 dark:text-white text-left text-xl">{{ $post->titlePost }}</h1>
                                        <p class="whitespace-pre px-4 py-2 text-balance text-gray-900 dark:text-white text-justify">{{ $post->contentPost }}</p>
                                    </div>
                                </div>
                               
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>