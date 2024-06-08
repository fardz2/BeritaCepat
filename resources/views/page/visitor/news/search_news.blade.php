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
                    @if ($searches->count() == 0)
                        <p>Berita tidak ditemukan</p>
                    @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach ($searches as $search)
                            <a href="{{ route('news.show', $search->title_slug) }}">
                                <div class="flex flex-col bg-white border border-gray-200 rounded shadow-sm">
                                    <div>
                                        <img src="{{ $search->thumbnail }}" class="object-cover w-full h-48" alt="{{ $search->title }}">
                                    </div>
                                    <div class="p-4">
                                        <h2 class="font-bold text-xl mb-2">{{ $search->title }}</h2>
                                
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    {{$searches->links()}}
                    @endif
                  
                </div>

@endsection
