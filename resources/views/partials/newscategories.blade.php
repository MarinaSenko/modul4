<div class="panel panel-default">
        <ul class="list-group">
        @foreach($newscategories as $newscategory)
        @if(count($newscategory->news) == 0)
        @else
            <div class="panel panel-default">
            
                <div class="panel-heading text-center"><li class="list-group-item h4 list-group-item-info"><a href="{{ url('/category/'.$newscategory->id) }}">{{ $newscategory->name }}    <span class="badge">{{ count($newscategory->news) }}</span></a></li>
                </div>
                    <ul class="list-group">
                            @foreach($newscategory->news as $record)
                                <li class="list-group-item"><a href="{{ url('/news/'.$record->id) }}">{{ $record->title }}</a></li>
                            @endforeach
                    </ul>
            </div>
             @endif
        @endforeach
        </ul>
</div>