
@extends('layouts.app')

@section('title', 'create homepage')


@section('content')

<div class="container">
	

<form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
	

@csrf

<div class="form-group">
	
<label for="title">title</label>
<input type="text" name="title" class="form-control">
</div>

<div class="form-group">
 <label for="content">content</label>
 <textarea name="content" rows="10" class="form-control"></textarea>
</div>

<div class="form-group">
	<label for="image">Profile image</label>
	<input type="file" name="image">
	<div>{{ $errors->first('image') }}</div>
</div>

<input type="hidden" name="user_id" value="{{$user_id}}">

<div class="form-group">
	<button type="submit" class="btn btn-outline-primary">Add blog post</button>
</div>

</form>

</div>
@endsection