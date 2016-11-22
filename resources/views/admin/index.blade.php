@extends('layouts.admin.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Админ панель</div>

                    <div class="panel-body">
                        Hello, {{ Auth::user()->name }}.
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection