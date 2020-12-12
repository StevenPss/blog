@extends('layouts.app')

@section('content')
    @include('partials.errors')
    <div class="card card-default">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                {{ isset($tag) ? 'Edit tag' : 'Create tag' }}
            </h5>
        </div>

        <div class="card-body">
            <form action="{{  isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="post">
                @csrf
                @if (isset($tag))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ isset($tag) ? $tag->name : '' }}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">{{ isset($tag) ? 'Update tag' : 'Create tag' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection