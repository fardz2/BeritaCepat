<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-end">
                        <a href="{{ route('news.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-5">
                            Tambah Berita
                        </a>
                    </div>
                    @if (session('status'))
                        <div class="bg-green-500 w-full p-5 rounded-md">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($news->isEmpty())
                        <p>Berita tidak ada</p>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach ($news as $item)
                            <div>
                                <a href="{{route('news.show',$item->title_slug)}}">
                                    <div class="w-full h-[200px]  overflow-hidden rounded-xl">
                                        <img src="{{asset($item->thumbnail)}}" alt=""  class="object-cover w-full h-full ">
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-lg">{{Str::limit($item->title,50)}}</h3>
                                        <a href="{{route('category.show',$item->categories[0]["category_slug"])}}" class="text-cyan-500">{{$item->categories[0]["category_name"]}}</a>
                                    </div>
                                 </a>
                            </div>
                                    
                            @endforeach
                        </div>
                        <center class="mt-4">
                            {{ $news->links() }}
                        </center>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
