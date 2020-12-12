@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Posts</h5> 
            <a href="{{ route('posts.create') }}" class="btn btn-success">Add Post</a>
        </div>

        <div class="card-body">
            <table id="dtTable" class="table table-striped">
                <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                <img src="/storage/{{ $post->image }}" height="60px" width="120px" />
                            </td>
                            <td>
                                {{ $post->title }}
                            </td>
                            <td>
                                <a href="{{ route('categories.edit', $post->category->id) }}">
                                    {{ $post->category->name }}
                                </a>
                            </td>
                            <td class="d-flex">
                                @if (!$post->trashed())
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm mr-2">Edit</a>
                                @else
                                    <form action="{{ route('restore-post', $post->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-info btn-sm mr-2">Restore</button>
                                    </form>
                                @endif
                                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        {{ $post->trashed() ? 'Delete' : 'Trash'}}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Actions</th>
                      </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection


@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endsection


@section('scripts')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#dtTable').DataTable();
        } );
    </script>
@endsection