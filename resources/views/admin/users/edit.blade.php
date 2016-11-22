@extends('layouts.admin.app')
@section('content')

    <div class="container">
        @include('partials.errorscreate')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Пользователи</div>

                    <div class="panel-body">
                        {!! Form::open(['url' => 'admin/users/'.$user->id, 'method' => 'put']) !!}
                        {!! Form::label('name', 'Имя  пользователя') !!}
                        {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                        <br/>
                        {!! Form::label('is_admin', 'Это админ?') !!}
                        {!! Form::select('is_admin', array('1' => 'Канеш', '0' => 'Еще чего!'), '0') !!}
                        <br/>
                        {!! Form::submit('Обновить!', ["class" => "btn btn-default"]) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        @include('partials.redirectback')
    </div>

@endsection