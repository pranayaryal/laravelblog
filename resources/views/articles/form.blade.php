

{!! Form::label('title', 'Title:')!!}

{!! Form::text('title')!!}

{!! Form::label('body', 'Body:')!!}

{!! Form::textarea('body')!!}

{!! Form::label('published_at', 'Publish On:')!!}

{!! Form::input('date', 'published_at', $article->published_at, ['class' => 'form-control'])!!}


{!! Form::label('tag_list', 'Tag:')!!}

{!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list' , 'class' => 'form-control', 'multiple'])!!}



{!! Form::submit($submitButtonText, ['class' => 'button'])!!}


@section('footer')
	<script>
		$('#tag_list').select2();
	</script>

@stop