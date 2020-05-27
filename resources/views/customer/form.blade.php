<div class="form-group">
	
<label for="name">name</label>
<input type="text" name="name" class="form-control" value="{{ old('name') ?? $customer->name }}">
<div>{{ $errors->first('name')}}</div>
</div>

<div class="form-group">
<label for="email">email</label>
<input type="text" name="email" class="form-control" value="{{ old('email') ?? $customer->email }}">
<div>{{ $errors->first('email')}}</div>
</div>

<div class="form-group">
<label for="active">Status</label>
 <select name="active" id="active" class="form-control">
 	<option value="" disabled>Select customer status</option>

 	@foreach($customer->activeOptions() as $activeOptionKey => $activeOptionValue)

 	<option value="{{ $activeOptionKey }}" {{ $customer->active == $activeOptionValue ? 'selected' : ''}}>
 	{{ $activeOptionValue}}</option>

 	@endforeach

 </select>
</div>

<div class="form-group">
<label for="company_id">Company</label>
<select name="company_id" id="company_id" class="form-control">

@foreach($companies as $company)
	<option value="{{ $company->id}}" {{ $company->id == $customer->company_id ? 'selected' : '' }}>{{$company->name}}</option>

@endforeach
</select>
</div>

<div class="form-group">
	<label for="image">Profile Image</label>
	<input type="file" name="image">
	<div>{{ $errors->first('image')}}</div>

</div>
@csrf