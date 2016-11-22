<div class="panel panel-default">
      
          <style type="text/css">
               div .promotion:hover {font-size: 14px;color: red;} 
               div .promotion {text-align: center; font-size:10px; border: 1px solid #ccc; height: 150px; margin-top: 20%;}
               
          </style> 
          @foreach($promotions as $promotion)
            
          <div class="promotion">
          <a href="{{ $promotion->site }}"><h5>{{ $promotion->company}}</h5></a> 
          {{$promotion->product}}
          <div class="target_obj">Цена: {{$promotion->price }}</div>
          <div class="floating_object">Новая цена: {{ ceil(($promotion->price)*0.9) }}</div>


          </div>
          @endforeach
      
</div>

