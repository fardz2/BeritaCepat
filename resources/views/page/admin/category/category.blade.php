<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Katergori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-end"> <a href="{{route('category.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded  mb-5"> Tambah Kategori</a></div>
                    @if (session('status'))
                        <div class="bg-green-500 w-full  p-5 rounded-md">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (count($categories) == 0)
                        <p>Kategori tidak tersedia</p>
                    @else
                      <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Kategori
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Aksi
                                    </th>
                            
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category )
                                    <tr class="bg-white border-b  ">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                            {{$category->category_name}}
                                        </th>
                                        <th  scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap  flex gap-2">

                                            <a href="{{route('category.edit',$category->id)}}"  class="bg-amber-400 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded">
                                                Edit
                                            </a>
                                            <form action="{{route('category.destroy',$category->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                    Delete
                                                </button>
                                            </form>
                                       
                                        </th>
                                      
                                    </tr>
                                  
                                @endforeach
                               
                               
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>