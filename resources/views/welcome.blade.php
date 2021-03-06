@extends('layouts.blog')

@section('title')
    Journey | Blog
@endsection

@section('header')
    <!-- Header -->
    <header class="header text-center text-white" style="background-image: url('{{ asset('img/BG-img.jpg') }}');box-shadow:inset 0 0 0 2000px rgba(0, 0, 0, 0.3);">
        <div class="container">
  
          <div class="row">
            <div class="col-md-8 mx-auto">
  
              <h1>The Journey is on</h1>
              <p class="lead-2 opacity-90 mt-6">Read and get updated on how we progress</p>
  
            </div>
          </div>
  
        </div>
      </header><!-- /.header -->
@endsection


@section('content')
    <!-- Main Content -->
    <main class="main-content">
        <div class="section bg-gray">
          <div class="container">
            <div class="row">
  
  
              <div class="col-md-8 col-xl-9">
                <div class="row gap-y">
                  @forelse ($posts as $post)
                      <div class="col-md-6">
                          <div class="card border hover-shadow-6 mb-6 d-block">
                              <a href="{{ route('blog.show', $post->id) }}"><img class="card-img-top" src="{{ $post->image }}"/></a>
                              <div class="p-6 text-center">
                                  <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="{{ route('blog.show', $post->id) }}">{{ $post->category->name }}</a></p>
                                  <h5 class="mb-0"><a class="text-dark" href="{{ route('blog.show', $post->id) }}">{{ $post->title }}</a></hh5>
                              </div>
                          </div>
                      </div>
                  @empty
                      <p class="text-center">
                        No results found for query <strong>{{ request()->query('search') }}</strong>
                      </p>
                  @endforelse
                </div>
  
                {{ $posts->appends(['search' => request()->query('search')])->links() }}
              </div>
  
  
  
              @include('partials.sidebar')
  
            </div>
          </div>
        </div>
      </main>
@endsection