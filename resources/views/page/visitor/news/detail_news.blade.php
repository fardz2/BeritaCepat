@extends('template.template')
@section('content')
<div class="mt-10 p-10">
    @if (auth()->user()->role == "admin")
    <div class="flex justify-end px-4 pt-4">
        <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500  focus:ring-4 focus:outline-none focus:ring-gray-200  rounded-lg text-sm p-1.5" type="button">
            <span class="sr-only">Open dropdown</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
            </svg>
        </button>
        <!-- Dropdown menu -->
        <div id="dropdown" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
            <ul class="py-2" aria-labelledby="dropdownButton">
                <li class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">
                    <a href="{{ route('news.edit', $news->id) }}" >Edit</a>
                </li>
                <li class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">
                    <form action="{{ route('news.destroy', $news->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" >Delete</button>
                    </form>
                </li>
             
            </ul>
        </div>
    </div> 
    @endif
    <div  class="w-full ">
        <img src="{{$news->thumbnail}}" alt="" class="object-cover object-center w-full  h-[600px]">
    </div>
    <div class="mt-10">
        <h1 class="font-bold text-3xl">
            {{$news->title}}
        </h1>
    </div>
    <div class="my-2">
        <p class="text-blue-400">{{$news->categories->first()->category_name}}</p>
    </div>
    <div>
        {!!$news->content !!}
    </div>
</div>

@endsection