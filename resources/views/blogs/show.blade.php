
@extends('layouts.app')

@section('title', 'show homepage')


@section('content')

<header class="masthead">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>show homepage</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
	<br>

        <div class="card mb-3">
          <img src="{{ asset('storage/' . $blog->image)}}" class="card-img-top" alt="">

          <div class="card-body">
            <h3 class="card-title">{{ $blog->title}}</h3>
            <h5 class="card-title">view:{{ $blog->countview}}</h5>

            <p class="card-text">{{ $blog->content}}</p>



        @can('view', $blog)

                 <a href="{{ route('blogs.edit', [$blog->id])}}" class="btn btn-outline-primary">Edit</a>

                <form action="{{ route('blogs.destory', [$blog->id])}}" method="POST">
            @csrf
            @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">delete</button>
                </form>

        @endcan


            <a href="{{ route('blogs.index')}}" class="btn btn-outline-info">Back</a>


          </div>
        </div>

        </div>
    </div>
</div>

@endsection
