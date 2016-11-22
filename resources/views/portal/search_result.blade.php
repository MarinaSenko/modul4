@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Результат поиска</h3>
        <div class="row">
            <div class="col-md-3">
            </div
            <div class="col-md-6">
                @foreach($news as $record)
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $record->title }}</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <a data-lightbox="{{ $record->title }}" href="{{ url('images/news/'.$record->picture) }}"><img class="img-responsive" src="{{ url('images/news/'.$record->picture) }}" alt="{{  $record->title }}"></a>
                                </div>
                                <div class="col-md-9">
                                    {!! mb_substr($record->body, 0, 255) !!} ...
                                    <a href="{{ url('/news/'.$record->id) }}">Read more...</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">Author: {{ $record->users->name }} | Published: {{ $record->created_at }} | Category:
                            <a href="{{ url('/category/'.$record->newscategories->id) }}">{{ $record->newscategories->name }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-3">
               
            
        </div>
    </div>
@endsection
