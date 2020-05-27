@extends('layouts.app')

@section('title', 'Customer crate!')


@section('content')

<div class="container">

<h1>Customer list</h1>

@if( ! session()->has('message'))

<form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
	
@include('customer.form')
	
	<button type="submit" class="btn btn-primary">Add Customer</button>

	
		</form>
	</div>


@endif

@endsection