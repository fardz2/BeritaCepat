@extends('template.template')
@section('content')
<p class="text-xl my-5 font-bold">{{$news_title}}</p>
@if($category_news->count() == 0)
    <h1>Berita Kosong</h1>
@else
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
    @foreach ($category_news as $item)
        <div>
            <a href="{{route('news.show', $item->title_slug)}}">
                <div class="w-full h-[200px] overflow-hidden rounded-xl">
                    <img src="{{asset($item->thumbnail)}}" alt="" class="object-cover w-full h-full">
                </div>
                <div>
                    <h3 class="font-bold text-2xl">{{$item->title}}</h3>
                    <a href="{{route('category.show', $item->categories[0]["category_slug"])}}" class="text-cyan-500">{{$item->categories[0]["category_name"]}}</a>
                </div>
             </a>
        </div>
    @endforeach
</div>

<div class="mt-4">
    {{ $category_news->links() }} <!-- Menambahkan link pagination -->
</div>
@endif
@endsection
