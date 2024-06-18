@extends('template.template')
@section('content')

            <section>
                <div class="mt-10 mx-3">
                    <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-black-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <form action="{{route("search")}}
                        " method="GET"> 
                            <div class="flex items-center justify-center gap-5">
                                <input type="text" id="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500  " placeholder="Cari berita" name="berita" />
                                <input type="submit"  class= "text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-2xl text-sm px-5 py-2.5  focus:outline-none  " value="Cari">
                            </div>
                        </form>
                        
                    </div>
                </div>
                <div class=" flex flex-col md:flex-row gap-4 mt-10">
                    <div class="basis-3/4">
                        <h1 class="text-3xl font-bold">Terbaru</h1>
                        <a href="{{route('news.show',$news_baru->title_slug)}}">
                            <div class="">
                                <div class="w-full  md:h-[500px]   h-[200px]   overflow-hidden rounded-xl">
                                    <img src="{{asset($news_baru->thumbnail)}}" alt="" class="object-cover w-full h-full">
                                </div>
                               
                                <h2 class="font-bold text-xl">{{$news_baru->title}}</h2>
                                <a href="{{route('category.show',$news_baru->categories[0]["category_slug"])}}" class="text-cyan-500 ">{{$news_baru->categories[0]["category_name"]}}</a>
                            </div>
                        </a>
                     
                    </div>
                    <div  class="basis-1/2">
                        <p> </p>
                        <div class="flex flex-col gap-4">
                            @foreach ($news_baru2 as $news )
                                <a href="{{route('news.show',$news->title_slug)}}">
                                    <div class="flex gap-4 lg:flex-row flex-col">
                                        <div class=" md:basis-1/2 md:h-[120px] md:w-[250px] w-full h-[200px]  overflow-hidden rounded-xl">
                                            <img src="{{asset($news->thumbnail)}}" alt=""  class="object-cover w-full h-full ">
                                        </div>
                                        <div>
                                            <h2 class="font-bold text-xl">{{$news->title}}</h2>
                                            <a href="{{route('category.show',$news->categories[0]["category_slug"])}}" class="text-cyan-500">{{$news->categories[0]["category_name"]}}</a>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="mt-10">
                    <h1 class="text-3xl font-bold">Trendings</h1>
                    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                        @foreach ($trendings as $trending)
                                <div>
                                    <a href="{{ route('news.show', $trending->title_slug) }}" class="flex flex-row">
                                        <div class="w-full h-[200px] overflow-hidden rounded-xl">
                                            <img src="{{ asset($trending->thumbnail) }}" alt="" class="object-cover w-full h-full">
                                        </div>
                                        <div>
                                            <h3 class="font-bold text-xl">{{ $trending->title }}</h3>
                                            @if (count($trending->categories) > 0)
                                                <a href="{{ route('category.show', $trending->categories[0]['category_slug']) }}" class="text-cyan-500">{{ $trending->categories[0]['category_name'] }}</a>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                         
                        @endforeach
                    </div>
                </div>
                <div class="bg-blue-400 p-10 mt-10 text-white">
                    <h3  class="text-3xl font-bold">Rekomendasi Untukmu</h3>
                   <div class="flex flex-col lg:flex-row gap-4">
                        <div class="basis-2/5 grid grid-flow-row lg:grid-cols-2 gap-4">
                            @foreach ($untukmu1 as $news )
                            <div>
                                <a href="{{ route('news.show', $news->title_slug) }}" class="flex flex-row">
                                    <div class="w-full h-[150px]  overflow-hidden rounded-xl">
                                        <img src="{{asset($news->thumbnail)}}" alt=""  class="object-cover w-full  h-full">
                                    </div>
                                    <div>
                                        <h3  class="font-bold text-xl">{{$news->title}}</h3>
                                        <a href="{{route('category.show',$news->categories[0]["category_slug"])}}" class="text-rose-700">{{$news->categories[0]["category_name"]}}</a>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <div class="basis-3/5">
                            <a href="{{ route('news.show', $untukmu2->title_slug) }}" class="flex flex-row">
                                <div class="w-full h-[100px] md:h-[400px] overflow-hidden rounded-xl">
                                    <img src="{{asset($untukmu2->thumbnail)}}" alt=""  class="object-cover w-full h-full">
                                </div>
                                <div>
                                    <h3  class="font-bold text-xl">{{$untukmu2->title}}</h3>
                                    <a href="{{route('category.show',$untukmu2->categories[0]["category_slug"])}}" class="text-rose-700">{{$untukmu2->categories[0]["category_name"]}}</a>
                                </div>
                             </a>
                        </div>
                        </div>
                   </div>
                </div>

@endsection
