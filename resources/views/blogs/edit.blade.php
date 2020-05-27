@extends('layouts.app')

@section('title', 'edit homepage')


@section('content')

<div class="container">
	

<form action="{{ route('blogs.update', [$blog->id]) }}" method="POST"  enctype="multipart/form-data">

@csrf

@method('PATCH')

<div class="form-group">
	
<label for="title">title</label>
<input type="text" name="title" class="form-control" value="{{ $blog->title }}">
</div>

<div class="form-group">
 <label for="content">content</label>
 <textarea name="content" rows="10" class="form-control">{{$blog->content }}</textarea>
</div>

<div class="form-group">
	<label for="image">Profile image</label>
	<input type="file" name="image" value="{{ asset($blog->image)}}">
</div>

<input type="hidden" name="user_id" value="{{$blog->user_id}}">
<div class="form-group">
	<button type="submit" class="btn btn-outline-primary">Edit blog post</button>
</div>

</form>
</div>

@endsection