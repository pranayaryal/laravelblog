@extends ('layouts.main')
@section ('content')
    <h2>All todo lists.</h2>
    <ul>
    	@foreach ($todo_lists as $list)
    	<li>{{{ $list->name }}}</li>
    	@endforeach
    </ul>
@stop