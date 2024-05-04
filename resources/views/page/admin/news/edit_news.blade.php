<x-app-layout>
    <x-head.tinymce-config/>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Berita') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('news.update',$news->id)}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-5">
                            <label for="category_name" class="block mb-2 text-sm font-medium text-gray-900 ">Judul</label>
                            <input type="text" id="category_name" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Judul"  value='{{$news->title}}'/>
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="thumbnail" class="block mb-2 text-sm font-medium text-gray-900 ">Thumbnail</label>
                            <img src="{{$news->thumbnail}}" alt="">
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none" id="file_input" type="file" name="thumbnail">
                            @error('thumbnail')
                                 <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="category"  class="block mb-2 text-sm font-medium text-gray-900 ">Kategori</label>
                            <select name="category"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                @foreach ($categories as $category)
                                    <option value="">--Pilih Kategori--</option>
                                    <option value="{{$category->id}}" @if ($news->categories->first()->id == $category->id)
                                        selected
                                    @endif>{{$category->category_name}}</option>
                                @endforeach
                            </select>
                            @error('category')
                                 <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                         
                        </div>
                        <div class="mb-5">
                            <label for="category_name" class="block mb-2 text-sm font-medium text-gray-900 ">Judul</label>
                            <textarea id="myeditorinstance" name="content">{{$news->content}}</textarea>
                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                   
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mt-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>