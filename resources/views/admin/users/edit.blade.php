@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
    <div class="my-5">
        <h3 class="my-4 d-inline">Edit User</h3>
        <a href="{{route('backend.users.index')}}" class="btn btn-danger float-end">Cancel</a>
    </div>
    <div class="my-5 mx-5">
        <form action="{{route('backend.users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('put')}}
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name" id="name" placeholder="Enter Name" value="{{$user->name}}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">{{$errors->first('name')}}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" name="email" id="email" placeholder="name@example.com" value="{{$user->email}}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">{{$errors->first('email')}}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}}" name="phone" id="phone" placeholder="Enter Phone" value="{{$user->phone}}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">{{$errors->first('name')}}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control {{$errors->has('address') ? 'is-invalid' : ''}}" name="address" id="address" placeholder="Enter Address" value="{{$user->address}}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">{{$errors->first('address')}}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" name="password" id="password" placeholder="Enter Password">
                @if($errors->has('password'))
                    <div class="invalid-feedback">{{$errors->first('password')}}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="cmfpassword" class="form-label">Comfirm Password</label>
                <input type="password" class="form-control {{$errors->has('cmfpassword') ? 'is-invalid' : ''}}" name="cmfpassword" id="cmfpassword" placeholder="Enter Password">
                @if($errors->has('cmfpassword'))
                    <div class="invalid-feedback">{{$errors->first('cmfpassword')}}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select {{$errors->has('role') ? 'is-invalid' : ''}}" name="role" id="role" aria-label="Select Role">
                    <option selected>Select Role</option>
                    <option value="Super Admin" {{$user->role== 'Super Admin' ?'selected' : ''}}>Super Admin</option>
                    <option value="Admin" {{$user->role== 'Admin' ? 'selected' : ''}}>Admin</option>
                    <option value="User" {{$user->role== 'User' ? 'selected' : ''}}>User</option>
                </select>
                @if($errors->has('role'))
                    <div class="invalid-feedback">{{$errors->first('role')}}</div>
                @endif
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>    
</div>
@endsection