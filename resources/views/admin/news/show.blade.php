@extends('layouts.admin.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $record->title }}</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img class="img-responsive" src="{{ url('/images/news/'.$record->picture) }}" alt="{{  $record->title }}">
                            </div>
                            <div class="col-md-9">
                                {!! $record->body !!}
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">Опубликовано: {{ $record->created_at }} | Категория:
                        <a href="{{ url('/admin/newscategories/'.$record->newscategories->id) }}">{{ $record->newscategories->name }}</a></div>
                </div>
            </div>
        </div>
        @include('partials.redirectback')
    </div>
@endsection