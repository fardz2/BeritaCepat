<header class="bg-blue-300 pb-4 ">
    <div class="flex justify-between items-center w-full py-5 md:px-32 px-5  ">
        <div class="font-bold ">
            <a href="{{route('welcome')}}">BeritaCepat</a>
       
        </div>
        <div>
            @if (auth()->check())
                <div class="flex justify-center items-center">
            
                    <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 focus:ring-4 focus:outline-none  " type="button">
                        {{auth()->user()->name}}
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                        
                        <!-- Dropdown menu -->
                        <div id="dropdownDots" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                            <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownMenuIconButton">
                                @if(auth()->user()->role == "admin")
                                    <li class="block px-4 py-2 hover:bg-gray-100 ">
                                        <a href="{{route('dashboard')}}" >Dashboard</a>
                                    </li>
                                @endif
                            <div class="py-2">
                                <li class="block px-4 py-2 hover:bg-gray-100 ">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                       <button type="submit" >Logout</button>
                                     </form>
                                </li>
                           
                            </div>
                        </div>
                </div>
              
            @else
            <a href="{{route('login')}}" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Login</a>
            @endif
          
        </div>
    </div>
    <div class="w-full h-[0.1px] bg-white mb-2"></div>
    <div class="flex gap-5 flex-row  md:px-32 px-5  items-center">
        @foreach ($categories as $category )
    
                <a href="{{route('category.show',$category->category_slug)}}">{{$category->category_name}}</a>
        
        @endforeach
    </div>   
</header>