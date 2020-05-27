 @extends('layouts.app')

@section('title', 'Customer list!')


@section('content')

<div class="row">
	<div class="col-12">
	<h1>Customer list!</h1>
	@can('create', App\Customer::class)

	<p><a href="{{ route('customer.create')}}">Add New Customer</a></p>

	@endcan
	</div>
</div>
	
		@foreach($customers as $customer)
		<div class="row">
		<div class="col-2">
			{{$customer->id}}
		</div>
		<div class="col-4">
		@can('view', $customer)

			<a href="{{ route('customer.show', [$customer->id])}}">{{$customer->name}}</a>

		@endcan
		
		@cannot('view', $customer)

			{{$customer->name}}
			
		@endcannot	

		</div>
		<div class="col-4">{{$customer->company->name}}</div>
		<div class="col-2">{{$customer->active}}</div>

</div>

		@endforeach
	

@endsection