@extends('layouts.app')

@section('title', 'Contact us!!')


@section('content')

<div class="container">

<h1>Contact us!!</h1>

@if( ! session()->has('message'))

<form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
	
<div class="form-group">
	
<label for="name">name</label>
<input type="text" name="name" class="form-control" value="{{ old('name') }}">
<div>{{ $errors->first('name')}}</div>
</div>

<div class="form-group">
<label for="email">email</label>
<input type="text" name="email" class="form-control" value="{{ old('email') }}">
<div>{{ $errors->first('email')}}</div>
</div>

<div class="form-group">
 <label for="message">message</label>
 <textarea name="message"col="30" rows="10" class="form-control" value="{{ old('message') }}"></textarea>
 <div>{{ $errors->first('message')}}</div>
</div>

@csrf
		
<button type="submit" class="btn btn-primary">post message</button>


		</form>
	</div>

@endif

@endsection