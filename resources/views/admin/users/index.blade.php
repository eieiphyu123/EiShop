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
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nmae</th>
                            <th>Email</th>
                            <th>Comfirmed Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Password</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tr>
                    <th>Nmae</th>
                            <th>Email</th>
                            <th>Comfirmed Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Password</th>
                            <th>Role</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td></td>
                            <td>{{($user->phone)}}</td>
                            <td>{{($user->address)}}</td>
                            <td>{{($user->password)}}</td>
                            <td>{{($user->role)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection