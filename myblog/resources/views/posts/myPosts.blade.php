<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight py-2">
            {{ __('My Posts') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($posts as $post)
                    <div class="shadow-2xl mb-4 rounded-lg p-4 bg-white dark:bg-gray-800">
                        <p class="text-xs text-gray-900 dark:text-white">ID Post: {{ $post->idPost }}</p>
                        @php
                            $nombreUser = $users->firstWhere('id', $post->idUserPoster)->name ?? 'Usuario desconocido';
                        @endphp
                        <p class="text-gray-900 dark:text-white">Usuario: {{ $nombreUser }}</p>
                        <h1 class="uppercase font-bold text-gray-900 dark:text-white text-left text-xl">{{ $post->titlePost }}</h1>
                        <p class="whitespace-pre text-gray-900 dark:text-white text-justify">{{ $post->contentPost }}</p>
                        <p class="text-gray-900 dark:text-white text-center">{{ $post->habilitated ? 'Habilitado' : 'No Habilitado' }}</p>
                        <div class="mt-4">
                            <form method="POST" action="{{ route('posts.eliminar', $post->idPost) }}" class="delete-post-form">
                                @csrf
                                <button type="button" class="bg-red-500 dark:bg-red-700 hover:bg-red-600 dark:hover:bg-red-800 text-white font-bold rounded px-5 py-2 delete-post-button">
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
