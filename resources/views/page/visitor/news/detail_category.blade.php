@extends('template.template')
@section('content')

@foreach ($category_news->news as $news )
    <p>{{$news->title}}</p>
@endforeach
@endsection