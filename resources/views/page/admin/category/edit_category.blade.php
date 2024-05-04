<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('category.update',$category->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div>
                            <label for="category_name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Kategori</label>
                            <input type="text" id="category_name" name="category_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Nama Kategori"  value="{{$category->category_name}}"/>
                        </div>
                        @error('category_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mt-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>