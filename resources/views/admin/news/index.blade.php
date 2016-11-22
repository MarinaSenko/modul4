@extends('layouts.admin.app')
@section('content')
    <div class="container">
        @include('partials.pushmessages')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Новости</div>
                    @if(count($news) == 0)
                        <div class="panel-body alert-danger">
                            There is no news, do you want to add <a href="{{url('/admin/news/create ')}}">Добавить новость</a>?
                        </div>
                    @else
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Заголовок</th>
                                    <th>Категория</th>
                                    <th>Создан</th>
                                    <th>Автор</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($news as $new)
                                    <tr>
                                        <td>{{ $new->id }}</td>
                                        <td>
                                            <a href="{{ url('admin/news/'.$new->id) }}">{{ $new->title }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/newscategories/'.$new->newscategories->id) }}">{{ $new->newscategories->name }}</a>
                                        </td>
                                        <td>{{ $new->created_at }}</td>
                                        <td>{{ $new->users->name }}</td>
                                        <td>
                                            <a class='btn btn-default' href="{{ url('/admin/news/'. $new->id .'/edit') }}">Edit</a>
                                        </td>
                                        <td>
                                            {{ Form::open(['url' => 'admin/news/'.$new->id, 'method' => 'delete']) }}
                                            {!! Form::submit('Удалить новость', ['class' => 'btn btn-default']) !!}
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection