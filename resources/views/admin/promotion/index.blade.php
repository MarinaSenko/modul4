@extends('layouts.admin.app')
@section('content')
    <div class="container">
        @include('partials.pushmessages')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Реклама</div>
                    @if(count($promotions) == 0)
                        <div class="panel-body alert-danger">
                            There is no news, do you want to add <a href="{{url('/admin/promotion/create ')}}">Добавить новость</a>?
                        </div>
                    @else
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Наименование товара</th>
                                    <th>Цена</th>
                                    <th>Сайт</th>
                                    <th>Компания</th>
            
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($promotions as $promotion)
                                    <tr>
                                        <td>{{ $promotion->id }}</td>
                                        <td>
                                            <a href="{{ url('admin/promotion/'.$promotion->id) }}">{{ $promotion->product }}</a>
                                        </td>
                                        <td>
                                            <a href="#">{{ $promotion->price }}</a>
                                        </td>
                                        <td>
                                            <a href="#">{{ $promotion->site }}</a>
                                        </td>
                                        <td>
                                            <a href="#">{{ $promotion->company }}</a>
                                        </td>
        
                                        <td>
                                            <a class='btn btn-default' href="{{ url('/admin/promotion/'. $promotion->id .'/edit') }}">Edit</a>
                                        </td>
                                        <td>
                                            {{ Form::open(['url' => 'admin/promotion/'.$promotion->id, 'method' => 'delete']) }}
                                            {!! Form::submit('Удалить запись', ['class' => 'btn btn-default']) !!}
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