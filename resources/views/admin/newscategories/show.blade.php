@extends('layouts.admin.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Новости категории: {{ $category->name }}</div>
                    @if(count($category->news) == 0)
                        <div class="panel-body alert-danger">
                            В этой категории нет новостей
                        </div>
                    @else
                        <div class="panel-body">
                            <ul class="list-group">
                                @foreach($category->news as $news)
                                    <li class="list-group-item">{{ $news->id }}. <a href="{{ url("/admin/news/$news->id") }}">{{ $news->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @include('partials.redirectback')
    </div>
@endsection