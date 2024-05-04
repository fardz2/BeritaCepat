<header>
    <div class="flex justify-between items-center md:px-32 px-5 bg-blue-300 w-full py-5 ">
        <div>logo</div>
        <div class="flex  gap-10">
            @foreach ($categories as $category )
                <a href="">{{$category->category_name}}</a>
            @endforeach
        </div>
        <div>
            @if (auth()->check())
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                   <button type="submit" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Logout</button>
                </form>
            @else
            <a href="{{route('login')}}" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Login</a>
            @endif
          
        </div>
    </div>
</header>