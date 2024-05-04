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
                        <input type="search" id="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500  " placeholder="Search" required />
                    </div>
                </div>
                <div class=" flex flex-col md:flex-row gap-4 mt-10">
                    <div class="basis-3/4">
                        <p>Terbaru</p>
                        <div class="w-full bg-gray-400 h-[500px]">
                        </div>
                    </div>
                    <div  class="basis-1/2">
                        <div class="flex justify-between">
                            <p>Trending</p>
                            <p>Lihat semua</p>
                        </div>
                        <div class="flex flex-col gap-4">
                            <div class="flex gap-4">
                                <div class="w-full bg-gray-400 h-[100px]"></div>
                                <div>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus, quia.</p>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <div class="w-full bg-gray-400 h-[100px]"></div>
                                <div>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus, quia.</p>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <div class="w-full bg-gray-400 h-[100px]"></div>
                                <div>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus, quia.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-10">
                    <p>Politik</p>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div>
                                <div class="w-full h-[200px] bg-gray-400"></div>
                                <div>
                                    <h3>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed, repudiandae?</h3>
                                </div>
                            </div>
                            <div>
                                <div class="w-full h-[200px] bg-gray-400"></div>
                                <div>
                                    <h3>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed, repudiandae?</h3>
                                </div>
                            </div>
                            <div>
                                <div class="w-full h-[200px] bg-gray-400"></div>
                                <div>
                                    <h3>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed, repudiandae?</h3>
                                </div>
                            </div>
                            <div>
                                <div class="w-full h-[200px] bg-gray-400"></div>
                                <div>
                                    <h3>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed, repudiandae?</h3>
                                </div>
                            </div>
                            <div>
                                <div class="w-full h-[200px] bg-gray-400"></div>
                                <div>
                                    <h3>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed, repudiandae?</h3>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="bg-blue-400 p-10 mt-10 text-white">
                    <h3>Hiburan</h3>
                   <div class="flex flex-col md:flex-row gap-4">
                        <div class="basis-2/5 grid grid-flow-row md:grid-cols-2 gap-4">
                            <div>
                                <div class="w-full h-[200px] bg-gray-400"></div>
                                <div>
                                    <h3>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed, repudiandae?</h3>
                                </div>
                            </div>
                            <div>
                                <div class="w-full h-[200px] bg-gray-400"></div>
                                <div>
                                    <h3>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed, repudiandae?</h3>
                                </div>
                            </div>
                            <div>
                                <div class="w-full h-[200px] bg-gray-400"></div>
                                <div>
                                    <h3>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed, repudiandae?</h3>
                                </div>
                            </div>
                            <div>
                                <div class="w-full h-[200px] bg-gray-400"></div>
                                <div>
                                    <h3>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed, repudiandae?</h3>
                                </div>
                            </div>
                        </div>
                        <div class="basis-3/5">
                            <div class="w-full h-[400px] bg-gray-400">
                                    hai
                            </div>
                        </div>
                   </div>
                </div>

@endsection
