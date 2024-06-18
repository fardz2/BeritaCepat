<header class="bg-blue-300 pb-4">
    <div class="flex justify-between items-center w-full py-5 md:px-32 px-5">
        <div class="font-bold">
            <a href="{{route('welcome')}}">BeritaCepat</a>
        </div>
        <div class="flex items-center">
            <!-- Mobile menu button -->
            <button id="menu-toggle" class="md:hidden text-gray-900 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
            <!-- User Dropdown -->
            @if (auth()->check())
                <div class="relative">
                    <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots" class="hidden md:inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 focus:ring-4 focus:outline-none" type="button">
                        {{auth()->user()->name}}
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownDots" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownMenuIconButton">
                            @if(auth()->user()->role == "admin")
                            <li class="block px-4 py-2 hover:bg-gray-100">
                                <a href="{{route('dashboard')}}">Dashboard</a>
                            </li>
                            @endif
                            <li class="block px-4 py-2 hover:bg-gray-100">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @else
            <a href="{{route('login')}}" class="hidden md:block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Login</a>
            @endif
        </div>
    </div>
    <div class="hidden md:block w-full h-[0.1px] bg-white mb-2"></div>
    <div class="md:flex hidden gap-5 flex-col md:flex-row md:px-32 px-5 md:items-center items-start">
        @foreach ($categories as $category)
        <a href="{{route('category.show',$category->category_slug)}}">{{$category->category_name}}</a>
        @endforeach
    </div>
    <div id="menu-content" class="hidden transition ">
        @if (auth()->check())
            <div class="flex justify-end md:px-32 px-5 mb-2 ml-auto">
                <button id="dropdownMenuIconButton1" data-dropdown-toggle="dropdownDots1" class="md:hidden inline-flex items-center text-sm font-medium text-center text-gray-900 focus:ring-4 focus:outline-none" type="button">
                        {{auth()->user()->name}}
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                </button>
                <div id="dropdownDots1" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownMenuIconButton1">
                        @if(auth()->user()->role == "admin")
                        <li class="block px-4 py-2 hover:bg-gray-100">
                            <a href="{{route('dashboard')}}">Dashboard</a>
                        </li>
                        @endif
                        <li class="block px-4 py-2 hover:bg-gray-100">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @else
            <div class="flex md:px-32 px-5 mb-2 ml-auto">
                <a href="{{route('login')}}" class="md:hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Login</a>
            </div>
        @endif
       <div class="md:hidden flex gap-5 flex-col md:flex-row md:px-32 px-5 md:items-center items-start">
            @foreach ($categories as $category)
            <a href="{{route('category.show',$category->category_slug)}}">{{$category->category_name}}</a>
            @endforeach
       </div>
    </div>
</header>

<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        var menuContent = document.getElementById('menu-content');
        if (window.innerWidth < 768) {
            menuContent.classList.toggle('hidden');
        }
    });

    document.getElementById('dropdownMenuIconButton1').addEventListener('click', function() {
        var dropdownDots1 = document.getElementById('dropdownDots1');
        dropdownDots1.classList.toggle('hidden');
    });


</script>
