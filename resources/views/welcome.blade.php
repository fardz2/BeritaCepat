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
                                <input type="text" id="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500  " placeholder="Search" name="berita" />
                                <input type="submit"  class= "text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-2xl text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 " value="Cari">
                            </div>
                        </form>
                        
                    </div>
                </div>
                <div class=" flex flex-col md:flex-row gap-4 mt-10">
                    <div class="basis-3/4">
                        <p>Terbaru</p>
                        <a href="{{route('news.show',$news_baru->title_slug)}}">
                            <div class="">
                                <div class="w-full h-[500px]  overflow-hidden rounded-xl">
                                    <img src="{{$news_baru->thumbnail}}" alt="" class="object-cover w-full">
                                </div>
                               
                                <h2 class="font-bold text-4xl">{{$news_baru->title}}</h2>
                                <a href="{{route('category.show',$news_baru->categories[0]["category_slug"])}}" class="text-cyan-500">{{$news_baru->categories[0]["category_name"]}}</a>
                            </div>
                        </a>
                     
                    </div>
                    <div  class="basis-1/2">
                        <p> </p>
                        <div class="flex flex-col gap-4">
                            @foreach ($news_baru2 as $news )
                                <a href="{{route('news.show',$news ->title_slug)}}">
                                    <div class="flex gap-4">
                                        <div class=" basis-1/2 h-[120px] w-[250px] overflow-hidden rounded-xl">
                                            <img src="{{$news->thumbnail}}" alt=""  class="object-cover w-full ">
                                        </div>
                                        <div>
                                            <h2 class="font-bold text-2xl">{{$news->title}}</h2>
                                            <a href="{{route('category.show',$news->categories[0]["category_slug"])}}" class="text-cyan-500">{{$news->categories[0]["category_name"]}}</a>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="mt-10">
                    <p>Trendings</p>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach ($trendings as $trending )
                            <div>
                                <div class="w-full h-[200px]  overflow-hidden rounded-xl">
                                    <img src="{{$trending->thumbnail}}" alt=""  class="object-cover w-full  ">
                                </div>
                                <div>
                                    <h3 class="font-bold text-2xl">{{$trending->title}}</h3>
                                    <a href="{{route('category.show',$trending->categories[0]["category_slug"])}}" class="text-cyan-500">{{$trending->categories[0]["category_name"]}}</a>
                                </div>
                            </div>
                        @endforeach
                           
                    </div>
                </div>
                <div class="bg-blue-400 p-10 mt-10 text-white">
                    <h3>Rekomendasi Untukmu</h3>
                   <div class="flex flex-col lg:flex-row gap-4">
                        <div class="basis-2/5 grid grid-flow-row lg:grid-cols-2 gap-4">
                            @foreach ($untukmu1 as $news )
                            <div>
                                <div class="w-full h-[150px]  overflow-hidden rounded-xl">
                                    <img src="{{$news->thumbnail}}" alt=""  class="object-cover w-full  ">
                                </div>
                                <div>
                                    <h3  class="font-bold text-2xl">{{$news->title}}</h3>
                                    <a href="{{route('category.show',$news->categories[0]["category_slug"])}}" class="text-rose-700">{{$news->categories[0]["category_name"]}}</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="basis-3/5">

                            <div class="w-full h-[400px]  overflow-hidden rounded-xl">
                                <img src="{{$untukmu2->thumbnail}}" alt=""  class="object-cover w-full  ">
                            </div>
                            <div>
                                <h3  class="font-bold text-2xl">{{$untukmu2->title}}</h3>
                                <a href="{{route('category.show',$untukmu2->categories[0]["category_slug"])}}" class="text-rose-700">{{$untukmu2->categories[0]["category_name"]}}</a>
                            </div>
                        </div>
                        </div>
                   </div>
                </div>

@endsection
