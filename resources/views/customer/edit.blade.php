@extends('layouts.app')

@section('title', 'Edit details for ' . $customer->name)


@section('content')

<div class="container">

<h1>Edit details for {{ $customer->name}}</h1>

@if( ! session()->has('message'))

<form action="{{ route('customer.update', [$customer->id])}}" method="POST" enctype="multipart/form-data">

@method('PATCH')	
@include('customer.form')
	
	<button type="submit" class="btn btn-primary">edit Customer</button>

	
		</form>
	</div>


@endif

@endsection