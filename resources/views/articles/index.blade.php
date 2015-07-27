@extends ('layouts.main')


@section('content')

	
    <h4>{{{ "Hello ".(isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email) }}}</h4>
	<h1>Articles</h1>

	<hr>

	
	@foreach ($articles as $article)

		<article>
			<h2>
				<a href="{{ url('/articles', $article->id)}}">{{ $article->title}}</a>
			</h2>

			<!-- <div class="body">{{ $article->body }}</div> -->
			<ul class="no-bullet button-group">
				<li>
					{!! link_to_route('articles.edit', 'edit', [$article->id], ['class'=>'tiny button'])!!}
				</li>
				<li>
					{!! Form::model($article, ['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
						{!! Form::button('destroy', ['type'=>'submit', 'class' => 'tiny alert button'])!!}
					{!! Form::close()!!}
				</li>

			</ul>
			<hr>
		</article>

	@endforeach

@section('logout')
	{!! link_to_route('auth.logout','Log Out',null, ['class' => 'alert button']) !!}
@stop

{!! link_to_route('articles.create','Create A New Article',null, ['class' => 'success button']) !!}

	

@stop

