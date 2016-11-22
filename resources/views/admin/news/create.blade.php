@extends('layouts.admin.app')
@section('content')
    <div class="container">
        @include('partials.errorscreate')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавление новости</div>
                    <div class="panel-body">
                        {!! Form::open(['url' => 'admin/news/', 'files' => true, 'class' => 'form-horizontal']) !!}
                        {!! Form::label('title', 'Заголовок',['class' => 'control-label']) !!}
                        {!! Form::text('title', '',['class' => 'form-control']) !!}
                        {!! Form::label('description', 'Описание',['class' => 'control-label']) !!}
                        {!! Form::text('description', '',['class' => 'form-control']) !!}
                        {!! Form::label('body', 'Контент',['class' => 'control-label']) !!}
                        {!! Form::textarea('body', '',['class' => 'form-control ckeditor', 'id' => 'editor']) !!}
                        <br>
                        {!! Form::label('newscategory_id', 'Категория',['class' => 'control-label']) !!}
                        {!! Form::select('newscategory_id', $cats) !!}
                        <br><br>
                        <br>
                        {!! Form::label('tag_id', 'Тег',['class' => 'control-label']) !!}
                        {!! Form::select('tag_id', $tags) !!}
                        <br><br>
                        {!! Form::label('is_analitic', 'Аналитика',['class' => 'control-label']) !!}
                        {!! Form::select('is_analitic', ['1' => 'Да', '0' => 'Нет'], 'Нет') !!}
                        <br><br>
                        {!! Form::label('picture', 'Изображение',['class' => 'control-label']) !!}
                        {!! Form::file('picture', ['class' => 'form-control']) !!}
                        <br><br>
                        {!! Form::submit('Добавить новость', ['class' => 'btn btn-default']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        @include('partials.redirectback')
    </div>
    <script type="text/javascript">
        CKEDITOR.replace( 'editor' );
    </script>
@endsection