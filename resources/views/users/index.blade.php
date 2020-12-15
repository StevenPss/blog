@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Users</h5> 
        </div>

        <div class="card-body">
            <table id="dtTable" class="table table-striped">
                <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <img src="{{ Gravatar::src($user->email, 50) }}">
                            </td>

                            <td>
                                {{ $user->name }}
                            </td>

                            <td>
                                {{ $user->email }}
                            </td>

                            <td>
                                {{ $user->role }}
                            </td>

                            <td>
                                @if ($user->role === 'writer')
                                    <button class="btn btn-success btn-sm" onclick="handleMakeAdmin({{$user->id}})">Make Admin</button>
                                @else
                                    <button class="btn btn-primary btn-sm" onclick="handleMakeWriter({{$user->id}})">Make Writer</button>
                                @endif
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                      </tr>
                </tfoot>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="makeAdminModal" tabindex="-1" role="dialog" aria-labelledby="makeAdminModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <form action="" method="post" id="makeAdminForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="makeAdminModalLabel">Make admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <p class="mb-0">Are you sure you want to make this user an Admin?</p>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Close</button>
                        <button type="submit" class="btn btn-success">Yes, Make Admin</button>
                        </div>
                    </div>
                </form>
                </div>
            </div><!--End Modal -->

            <!-- Modal -->
            <div class="modal fade" id="makeWriterModal" tabindex="-1" role="dialog" aria-labelledby="makeWriterModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <form action="" method="post" id="makeWriterForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="makeWriterModalLabel">Make writer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <p class="mb-0">Are you sure you want to make this user a Writer?</p>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Close</button>
                        <button type="submit" class="btn btn-success">Yes, Make Writer</button>
                        </div>
                    </div>
                </form>
                </div>
            </div><!--End Modal -->
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

        function handleMakeAdmin(id) {
            var form = document.getElementById('makeAdminForm')
            form.action = '/users/' + id + '/make-admin'
            $('#makeAdminModal').modal('show')
        }

        function handleMakeWriter(id) {
            var form = document.getElementById('makeWriterForm')
            form.action = '/users/' + id + '/make-writer'
            $('#makeWriterModal').modal('show')
        }
    </script>
@endsection