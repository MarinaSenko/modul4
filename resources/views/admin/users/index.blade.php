@extends('layouts.admin.app')
@section('content')
    <div class="container">
        @include('partials.pushmessages')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Пользователи</div>

                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Имя</th>
                                <th>Email</th>
                                <th>Активность</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td><a class="btn btn-default" href="{{ url('/admin/users/'. $user->id .'/edit') }}">Редактировать</a></td>
                                    <td>
                                        {{ Form::open(['url' => 'admin/users/'.$user->id, 'method' => 'delete']) }}
                                        {!! Form::submit('Удалить юзера!', ["class" => "btn btn-default"]) !!}
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection