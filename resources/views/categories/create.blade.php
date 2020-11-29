@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card card-default">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                {{ isset($category) ? 'Edit category' : 'Create category' }}
            </h5>
        </div>

        <div class="card-body">
            <form action="{{  isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="post">
                @csrf
                @if (isset($category))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ isset($category) ? $category->name : '' }}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">{{ isset($category) ? 'Update category' : 'Create category' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection