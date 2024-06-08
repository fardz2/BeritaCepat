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
                                <a href="{{ route('news.show', $item->title_slug) }}">
                                    <div class="flex flex-col bg-white border border-gray-200 rounded shadow-sm">
                                        <div>
                                            <img src="{{ $item->thumbnail }}" class="object-cover w-full h-48" alt="{{ $item->title }}">
                                        </div>
                                        <div class="p-4">
                                            <h2 class="font-bold text-xl mb-2">{{ $item->title }}</h2>
                                        </div>
                                    </div>
                                </a>
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
