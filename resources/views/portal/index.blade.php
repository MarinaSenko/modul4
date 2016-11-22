@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('partials.search')
            </div>
            <div class="col-md-12">
                @include('partials.filter')
                <br>
            </div>
        </div>
        
        <div class="row">
            <!--Левый блок рекламы-->
            <div class="col-md-2">
                @include('partials.promotion_left')
            </div>
            
            <div class="col-md-8">
                
                <div class="panel panel-default">
                       @include('partials.carousel')
                </div>
                       @include('partials.sidebar')
                       
                <div class="panel panel-default">
                     <div class="panel panel-default">
                        <ul class="list-group">
       
        
            <div class="panel panel-default">
             <div class="panel-heading text-center"><li class="list-group-item h4 list-group-item-info">ТОП новости</li>
                </div>
                    <ul class="list-group">
                        @foreach($sliders as $slider)
                                <li class="list-group-item"><a href="{{ url('/news/'.$slider->id) }}">{{ $slider->title }}</a></li>
                        @endforeach
                    </ul>
            </div>
            </ul>
            </div>
                </div>
                     <div class="panel panel-default">
                     <div class="panel panel-default">
                        <ul class="list-group">
       
        
            <div class="panel panel-default">
             <div class="panel-heading text-center"><li class="list-group-item h4 list-group-item-info">ТОП комментаторы</li>
                </div>
                    <ul class="list-group">
                        @foreach($topcoms as $topcom)
                                <li class="list-group-item"><a href="{{ url('/news/'.$topcom->id) }}">{{ $topcom->name }}</a></li>
                        @endforeach
                    </ul>
            </div>
            </ul>
            </div>
                </div>
                    
            </div>
                
                 
            <div class="col-md-2">
             @include('partials.promotion_left')
            </div>
        </div>
    </div>
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins  and Typeahead) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Typeahead.js Bundle -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <!-- Typeahead Initialization -->
    <script>
        var flo = $('.floating_object').hide();
    var tar = $('.target_obj');

tar.mouseenter(function(){
    var posTop = $(this).offset().top;
    var posLeft = $(this).offset().left;
    var minW = $(this).width();
    $(this).next(flo).css({
        top: posTop,
        left: posLeft,
        minWidth: minW
    }).fadeIn();
});

flo.mouseout(function(){
    $(this).delay(200).fadeOut();
});
    </script>
@endsection
