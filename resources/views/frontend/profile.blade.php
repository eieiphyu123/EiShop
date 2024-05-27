@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <div class="my-4" id="showForm">
        <h3 class="my-4 d-inline">User Profile</h3>                      
        <div class="card mx-1 my-2 row" >            
            <div class="card-body col-md-12">
                <div class="mb-3">                                        
                    <label for="name" class="form-label">Your ID: <span class="fw-bold">{{$user->id}}</span></label>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">User Name: <span class="fw-bold">{{$user->name}}</span></label>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Email: <span class="fw-bold">{{$user->email}}</span></label>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Phone: <span class="fw-bold">{{$user->phone}}</span></label>
                </div>                            
                <div class="mb-3">
                    <label for="name" class="form-label">Address: <span class="fw-bold">{{$user->address}}</span></label>
                </div>
                <div>
                    <button class="btn btn-primary btn-sm fw-bold edit" type="button">Edit Your Information</button>                           
                </div>
            </div>
                                           
        </div>                    
    </div>  
        <!-- Edit Your Information -->
        <form action="{{route('profile.update',Auth::user()->id)}}" method="POST" enctype="multipart/form-data" class="px-4 py-4" id="editForm">
            {{csrf_field()}}
            {{method_field('put')}}
            <div class="mb-3">
                <h4 class="my-4 d-inline">Edit Your Information</h4>
                <button class="btn btn-sm btn-danger cancel float-end" type="button">Cancel</button>
            </div>

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
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>     
     
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
    $('#editForm').hide();
        $('.edit').on('click',function(){
            $('#showForm').hide();
            $('#editForm').show();
            $('.cancel').on('click',function(){
                $('#showForm').show();
            $('#editForm').hide();
            })
        });
    })
</script>
@endsection
