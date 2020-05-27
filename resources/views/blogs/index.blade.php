@extends('layouts.app')

@section('title', 'welcome homepage')


@section('content')
<header class="masthead">
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Blog homepage</h1>
    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
  </div>
</div>
</header>



<!-- Page content -->
<div class="main-content">
        <div class="col-lg-8 col-md-10 mx-auto">
        @guest
        @else

            <a href="{{ route('blogs.create')}}" class="btn btn-primary">Add  new</a>

        @endguest


                @foreach($blogs as $blog)


                <a href="{{ route('blogs.show', [$blog->id])}}">{{ $blog->title}}</a>
                <h2 class="posttime">posted:{{ $blog->created_at->diffForHumans() }}</h2>
                <h5 class="post-subtitle">{{ $blog->content }}</h5>
                <p class="post-meta">print id: {{ $blog->id }}</p>
                <h5 class="post-view">view:{{$blog->countview}}</h5>

               <a href="{{ route('blogs.show', [$blog->id])}}" class="btn btn-outline-primary">View Post</a>
                    <hr>
                @endforeach
                     <div>{{ $blogs->links() }}</div>

                </div>

            </div>



@endsection
