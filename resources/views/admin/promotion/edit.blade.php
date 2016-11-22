@extends('layouts.admin.app')
@section('content')
    <div class="container">
        @include('partials.errorscreate')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Редактирование рекламы</div>

                    <div class="panel-body">
                        {!! Form::open(['url' => 'admin/promotion/'.$promotion->id, 'files' => true, 'method' => 'put', 'class' => 'form-horizontal']) !!}
                        {!! Form::label('product', 'Наименование товара/услуги',['class' => 'control-label']) !!}
                        {!! Form::text('product', $promotion->product,['class' => 'form-control']) !!}
                        {!! Form::label('price', 'Цена',['class' => 'control-label']) !!}
                        {!! Form::text('price', $promotion->price,['class' => 'form-control']) !!}
                        {!! Form::label('site', 'Сайт',['class' => 'control-label']) !!}
                        {!! Form::text('site', $promotion->site,['class' => 'form-control']) !!}
                        {!! Form::label('company', 'Компания',['class' => 'control-label']) !!}
                        {!! Form::text('company', $promotion->company,['class' => 'form-control']) !!}
                         <br><br>
                        {!! Form::hidden('pic', 'present') !!}
                        {!! Form::label('img', 'Изображение',['class' => 'control-label']) !!}
                        {!! Form::file('img', ['class' => 'form-control']) !!}
                        <br><br>
                        {!! Form::submit('Обновить запись', ["class" => "btn btn-default"]) !!}
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