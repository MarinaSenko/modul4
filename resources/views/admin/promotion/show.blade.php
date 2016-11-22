@extends('layouts.admin.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $promotion->product }}</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img class="img-responsive" src="{{ url('/images/promotion/'.$promotion->img) }}" alt="{{  $promotion->product }}">
                            </div>
                            <div class="col-md-9">
                                <ul>
                                     <li>{!! $promotion->product !!}</li>
                                     <li>{!! $promotion->price !!}</li>
                                     <li>{!! $promotion->company !!}</li>
                                     <li>{!! $promotion->site !!}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        @include('partials.redirectback')
    </div>
@endsection