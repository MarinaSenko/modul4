<form class="typeahead" role="search" method="post"  data-toggle="dropdown" id="search" action="{{ route('search') }}">
      <div class="form-group">
        <input type="search" name="q" class="form-control" placeholder="Search" autocomplete="on">
      </div>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

 