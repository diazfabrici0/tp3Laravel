<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Iniciaste sesión!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="grid h-60  grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 py-6">
        <div class="py-8 border px-8 max-w-sm mx-auto bg-gray-900 rounded-xl shadow-lg space-y-2 sm:py-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-6">
            <img class="block mx-auto h-24 rounded-full sm:mx-0 sm:shrink-0" src="/img/erin-lindford.jpg" alt="logo" />
            <div class="text-center space-y-2 sm:text-left">
                <div class="space-y-0.5">
                    <p class="text-lg text-white font-semibold">
                        {{__("Crear post")}}
                    </p>
                </div>
                <button class="px-4 py-1 text-sm text-blue-600 font-semibold rounded-full border border-blue-600 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">
                    <a href="{{ route('posts.create')}}">Ir</a>
                </button> 
            </div>
        </div>
        <div class="py-8 border px-8 max-w-sm mx-auto bg-gray-900 rounded-xl shadow-lg space-y-2 sm:py-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-6">
            <img class="block mx-auto h-24 rounded-full sm:mx-0 sm:shrink-0" src="/img/erin-lindford.jpg" alt="logo" />
            <div class="text-center space-y-2 sm:text-left">
                <div class="space-y-0.5">
                    <p class="text-lg text-white font-semibold">
                        {{__("Ver posts")}}
                    </p>
                </div>
                <button class="px-4 py-1 text-sm text-blue-600 font-semibold rounded-full border border-blue-600 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">
                    <a href="{{ route('posts.index')}}">Ir</a>
                </button>            
            </div>
        </div>
        <div class="py-8 border px-8 max-w-sm mx-auto bg-gray-900 rounded-xl shadow-lg space-y-2 sm:py-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-6">
            <img class="block mx-auto h-24 rounded-full sm:mx-0 sm:shrink-0" src="/img/erin-lindford.jpg" alt="logo" />
            <div class="text-center space-y-2 sm:text-left">
                <div class="space-y-0.5">
                    <p class="text-lg text-white font-semibold">
                        {{__("Mis Posts")}}
                    </p>
                </div>
                <button class="px-4 py-1 text-sm text-blue-600 font-semibold rounded-full border border-blue-600 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">
                    <a href="{{ route('posts.myPosts')}}">Ir</a>
                </button>            
             </div>
        </div>
        <div class="py-8 border px-8 max-w-sm mx-auto bg-gray-900 rounded-xl shadow-lg space-y-2 sm:py-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-6">
            <img class="block mx-auto h-24 rounded-full sm:mx-0 sm:shrink-0" src="/img/erin-lindford.jpg" alt="logo" />
            <div class="text-center space-y-2 sm:text-left">
                <div class="space-y-0.5">
                    <p class="text-lg text-white font-semibold">
                        {{__("Editar perfil")}}
                    </p>
                </div>
                <button class="px-4 py-1 text-sm text-blue-600 font-semibold rounded-full border border-blue-600 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">
                    <a href="{{ route('profile.edit')}}">Ir</a>
                </button> 
            </div>
        </div>
    </div>
    
    
</x-app-layout>
