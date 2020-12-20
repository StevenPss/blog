@extends('layouts.app')

@section('content')
@include('partials.errors')
<div class="card">
    <div class="card-header">Profile</div>

    <div class="card-body">
        <form action="{{ route('users.edit', $user->id) }}" method="post">
            @csrf
            @method('PUT')
          
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="about">About</label>
                <textarea class="form-control" name="about" id="about" cols="4" rows="4">{{ $user->about }}</textarea>
            </div>
                       
            <div class="form-group">
                <button class="btn btn-success">Update profile</button>
            </div>
        </form>
    </div>
</div>
@endsection
