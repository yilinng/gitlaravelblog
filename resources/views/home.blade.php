@extends('layouts.app')

@section('title', 'welcome homepage')


@section('content')

<header class="masthead">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1 class="cover-heading">Cover your page.</h1>
                    <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
                    <p class="lead">

                      <a href="{{ url('/blogs') }}" class="btn btn-lg btn-primary">Learn more</a>

                    </p>
                </div>
            </div>
        </div>
    </div>
</header>



@endsection
