<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight py-2">
                {{ __('Crear un post') }}
            </h2>
    </x-slot>
    <div class="flex justify-center items-center py-12">
        <div class="w-10/12 border rounded-lg md:w-8/12 lg:w-6/12">
            <div class="py-4 shadow-md px-4">
                <form action="{{ route('posts.store') }}" method="post" class="  rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    <div class="mb-4">
                        <label for="titlePost" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo</label>
                        <input type="text" id="titlePost" name="titlePost" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div class="mb-6">
                        <label for="contentPost" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Texto</label>
                        <textarea id="contentPost" name="contentPost" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-textarea w-full" id="contentPost" name="contentPost" rows="3" required></textarea>
                    </div>
                    <div class="mb-6">
                        <label for="idCategory" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría</label>
                        <select id="idCategory" name="idCategory" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-select w-full" id="idCategory" name="idCategory" required>
                            <option value="" disabled selected>Selecciona una categoría</option>
                            @foreach ($colCategories as $category)
                                <option value="{{ $category->idCategory }}">{{ $category->nameCategory }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-center justify-center">
                        <button type="submit"
                            class="py-2 px-2 text-blue-600 font-semibold rounded-full border border-blue-600 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">
                            Crear Post
                        </button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</x-app-layout>
