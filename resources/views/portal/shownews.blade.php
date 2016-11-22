@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.pushmessages')
        <div class="row">
            
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>{{ $record->title }} </strong></div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <a data-lightbox="{{ $record->title }}" href="{{ url('images/news/'.$record->picture) }}"><img class="img-responsive" src="{{ url('images/news/'.$record->picture) }}" alt="{{  $record->title }}"></a>
                            </div>
                            <div class="col-md-9">
                                {!! $record->body !!}
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                         Опубликовано: {{ $record->created_at }} | Категория:
                        <a href="{{ url('/category/'.$record->newscategories->id) }}">{{ $record->newscategories->name }}</a></div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Комментарий для новости: <strong>{{ $record->title }}</strong></div>
                        <div class="panel-body">
                            @if(count($record->comments) > 0)
                                @foreach($record->comments as $comment)
                                    <p style="background: #666; color: #fff; padding: 5px; border-radius: 3px;">
                                        <strong>{{ $comment->user->name }}</strong> @ <strong><i>{{ $comment->created_at }}</i></strong></p>
                                    <p style="background: #eee; padding: 5px 25px; border-radius: 3px;"> -> {{ $comment->comment }}
                                        @if(Auth::check())
                                            @if(Auth::user()->id == $comment->user->id || Auth::user()->is_admin)
                                                <span><a class="btn-sm btn-default" href="{{ url("news/$record->id/comment/$comment->id/delete") }}">Удалить</a></span>
                                            @endif
                                        @endif
                                    </p>
                                @endforeach
                            @else
                                <p style="background: #666; color: #fff; padding: 5px; border-radius: 3px;">
                                    Еще нет комментариев для этой новости.
                                </p>
                            @endif
                            @if(Auth::check())
                                <br>
                                <hr>
                                <br>
                                <div class="col-md-12">
                                    {!! Form::open(['url' => 'news/'. $record->id . '/addcomment', 'class' => 'form-horizontal']) !!}
                                    {!! Form::text('comment', null, ['class' => 'form-control']) !!}
                                    <br />
                                    {!! Form::submit('Написать комментарий', ["class" => "btn btn-default center-block"]) !!}
                                    {!! Form::close() !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
