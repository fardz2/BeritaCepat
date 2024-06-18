@extends('template.template')
@section('content')
<div class="mt-10 md:p-10">
    @auth
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
    @endauth
    
    <div  class="w-full  md:h-[400px] h-[200px] overflow-hidden rounded-xl ">
        <img src="{{asset($news->thumbnail)}}" alt="" class="object-cover w-full h-full">
    </div>
    <div class="mt-10">
        <h1 class="font-bold text-xl">
            {{$news->title}}
        </h1>
    </div>
    <div class="my-2">
        <a href="{{route('category.show',$news->categories->first()->category_slug)}}">
            <p class="text-blue-400">{{$news->categories->first()->category_name}}</p>
        </a>
    </div>
    <div>
        {!!$news->content !!}
    </div>
    <div>
        @auth
        <form action="{{route('comment.store',$news->id)}}" method="POST">
            @csrf
            <input type="text" name="user_id" value="{{auth()->user()->id}}" hidden>
            <div class="mb-7">
                <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 ">Berikan Komentar</label>
                <div class="flex justify-center items-center gap-2">
                    <input type="text" id="comment" name="comment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Tulis Komentar anda"  />
                    <button type="submit " value="kirim"  class= "text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-2xl text-sm px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 "><svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.20308 1.04312C1.00481 0.954998 0.772341 1.0048 0.627577 1.16641C0.482813 1.32802 0.458794 1.56455 0.568117 1.75196L3.92115 7.50002L0.568117 13.2481C0.458794 13.4355 0.482813 13.672 0.627577 13.8336C0.772341 13.9952 1.00481 14.045 1.20308 13.9569L14.7031 7.95693C14.8836 7.87668 15 7.69762 15 7.50002C15 7.30243 14.8836 7.12337 14.7031 7.04312L1.20308 1.04312ZM4.84553 7.10002L2.21234 2.586L13.2689 7.50002L2.21234 12.414L4.84552 7.90002H9C9.22092 7.90002 9.4 7.72094 9.4 7.50002C9.4 7.27911 9.22092 7.10002 9 7.10002H4.84553Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path></svg></button>
                </div>
              
                @error('comment')
                    <div class="text-red-500 ">{{ $message }}</div>
                @enderror
            </div>
      
        </form>
        @endauth
       
        <p>{{$news->comments()->count()}} Komentar</p>
        @if ($news->comments()->count() == 0)
            <p>Komentar Kosong</p>
        @else
            <div class="flex flex-col gap-4">
                @foreach ($news->comments as $comment)
                    <div class="w-full  bg-white border border-gray-200 rounded-lg shadow ">  
                        <div class="flex p-5 justify-between">
                            <div>
                                <p class=" font-bold">{{$comment->name}} - {{ \Carbon\Carbon::parse($comment->pivot->created_at)->diffForHumans()}}</p>
                                <p>{{$comment->pivot->comment}}</p>
                            </div>
             
                            <div>
                                @auth
                                @if (auth()->user()->id == $comment->pivot->user_id)
                                    <button id="dropdownButton{{$comment->pivot->id}}" data-dropdown-toggle="dropdown{{$comment->pivot->id}}" class="inline-block text-gray-500  focus:ring-4 focus:outline-none focus:ring-gray-200  rounded-lg text-sm p-1.5" type="button">
                                        <span class="sr-only">Open dropdown</span>
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                        </svg>
                                    </button>

                                    <div id="dropdown{{$comment->pivot->id}}" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                                        <ul class="py-2" aria-labelledby="dropdownButton{{$comment->pivot->id}}">
                                            <li class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">
                                                <form action="{{ route('comment.destroy', ["comment_id"=>$comment->pivot->id,"id"=>$news->id]) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" >Delete</button>
                                                </form> 
                                            </li>
                                        
                                        </ul>
                                    </div>
                                @endif
                                @endauth
                                
                            </div>
                        </div>
                    </div>

                @endforeach
           </div>
        @endif

    </div>
</div>

@endsection