<x-app-layout>
    <div class="flex justify-center items-center h-screen">
        <div class="w-10/12 md:w-8/12 lg:w-6/12">
            <h3 class="text-xl md:text-2xl lg:text-3xl font-bold mb-4 text-white">Crear un post</h3>
            <form action="{{ route('posts.store') }}" method="post" class=" shadow-md rounded px-8 pt-6 pb-8 mb-4">
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
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Crear Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
