@extends('layouts.admin.app')
@section('content')
    <div class="container">
        @include('partials.errorscreate')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавление рекламы</div>
                    <div class="panel-body">
                        {!! Form::open(['url' => 'admin/promotion/', 'files' => true, 'class' => 'form-horizontal']) !!}
                        {!! Form::label('product', 'Наименование товара/услуги',['class' => 'control-label']) !!}
                        {!! Form::text('product', '',['class' => 'form-control']) !!}
                        {!! Form::label('price', 'Цена',['class' => 'control-label']) !!}
                        {!! Form::text('price', '',['class' => 'form-control']) !!}
                        {!! Form::label('site', 'Сайт',['class' => 'control-label']) !!}
                        {!! Form::text('site', '',['class' => 'form-control']) !!}
                        {!! Form::label('company', 'Компания',['class' => 'control-label']) !!}
                        {!! Form::text('company', '',['class' => 'form-control']) !!}
                        <br><br>
                        {!! Form::label('img', 'Изображение',['class' => 'control-label']) !!}
                        {!! Form::file('img', ['class' => 'form-control']) !!}
                        <br><br>
                        {!! Form::submit('Добавить рекламу', ['class' => 'btn btn-default']) !!}
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