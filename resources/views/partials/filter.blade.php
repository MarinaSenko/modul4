{!! Form::open(['url' => '/', 'class' => 'form-horizontal']) !!}

{!! Form::label('date-from', 'Дата с',['class' => 'control-label']) !!}
{!! Form::date('date-from') !!}

{!! Form::label('date_before', 'по',['class' => 'control-label']) !!}
{!! Form::date('date_before') !!}

{!! Form::label('newscategory_id', 'Категория',['class' => 'control-label']) !!}
{!! Form::checkbox('newscategory_id') !!}

{!! Form::label('teg_id', 'Тег',['class' => 'control-label']) !!}
{!! Form::checkbox('tag_id') !!}

{!! Form::submit('Поиск', ['class' => 'btn btn-default']) !!}
{!! Form::close() !!}