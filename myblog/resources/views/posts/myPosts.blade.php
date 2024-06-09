<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('MyPosts') }}
            </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border mb-4 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($posts as $post)
                        <p class="px-4 py-2 text-xs text-gray-900 dark:text-white text-left">ID Post: {{ $post->idPost }}</p>
                        @php
                            $nombreUser = $users->firstWhere('id', $post->idUserPoster)->name ?? 'Usuario desconocido';

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
                            <p class="px-4 py-2 text-xs text-gray-900 dark:text-white text-left">Usuario: {{ $nombreUser }}</p>
                            <h1 class="px-4 py-2 uppercase font-bold text-gray-900 dark:text-white text-left text-xl">{{ $post->titlePost }}</h1>
                            <p class="whitespace-pre px-4 py-2 text-balance text-gray-900 dark:text-white text-justify">{{ $post->contentPost }}</p>
                            <div class="mt-4">
                                <form method="POST" action="{{ route('posts.eliminar', $post->idPost) }}" class="delete-post-form px-4">
                                    @csrf
                                    <button type="button" class="text-red-600 font-semibold rounded-full border border-red-600 hover:text-white hover:bg-red-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 px-5 py-2 delete-post-button">
                                        Eliminar Post
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                @endforeach
            </div>
        </div>
    </div>
    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-post-button');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const form = this.closest('form');

                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "¡No podrás revertir esto!",
                        icon: 'warning',
                        background: '#1B2C68',
                        color: 'white',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, eliminarlo',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
</x-app-layout>
