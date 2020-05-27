 @extends('layouts.app')

@section('title', 'show detail ' . $customer->name)


@section('content')

<div class="row">
	<div class="col-12">
	<h1>show detail {{ $customer->name}}</h1>
	
@can('view', $customer)	
	<p><a href="{{ route('customer.edit', [$customer->id])}}">Edit Customer</a></p>

	<form action="{{ route('customer.destory', [$customer->id])}}" method="POST">
		@method('DELETE')

		@csrf

		<button type="submit" class="btn btn-danger">DELETE</button>
		
	</form>

	</div>
@endcan

</div>
	
		<div class="row">
		<div class="col-12">
		</div>
		<div class="col-4">{{$customer->name}}</div>
		<div class="col-4">{{$customer->company->name}}</div>
		<div class="col-2">{{$customer->active}}</div>

</div>

	@if($customer->image)
		<div class="row">
			<div class="col-12">
				<img src="{{ asset('storage/' . $customer->image) }}" class="img-thumbnail">
			</div>

		</div>

	@endif

@endsection