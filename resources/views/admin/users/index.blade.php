@extends('layouts.admin')
@section('content')
    <!-- @php
        var_dump($users)
    @endphp -->
    <div class="container-fluid px-4">
    <div class="my-5">
            <h3 class="my-4 d-inline">Users</h3>
            <a href="{{route('backend.users.create')}}" class="btn btn-primary float-end">Add User</a>
        </div>    
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                User DataTable
            </div>
            <div class="card-body">
                <table id="" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nmae</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nmae</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody id="user_tbody">
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{($user->phone)}}</td>
                            <td>{{($user->address)}}</td>
                            <td>@if($user->role == 1)
                                    Super Admin
                                @elseif($user->role == 2)
                                    Admin
                                @elseif($user->role == 3)
                                    User
                                @endif
                            </td>
                            <td>
                                <a href="{{route('backend.users.edit',$user->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                <button class="btn btn-sm btn-danger delete" data-id="{{$user->id}}">Delete</button>            
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you Sure?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <form action="" id="deleteForm" method="POST">
                {{csrf_field()}}
                {{method_field('delete')}}
                <button type="submit" class="btn btn-danger">Yes</button>
            </form>   
        </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $('#user_tbody').on('click','.delete',function(){
            // alert('hi');
            let id=$(this).data('id');
            // console.log(id);
            $('#deleteForm').prop('action','users/'+id);
            $("#deleteModal").modal('show');
        })
    })
</script>
@endsection
