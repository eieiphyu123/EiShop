@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
    <div class="my-5">
        <h3 class="my-4 d-inline">Edit Payment</h3>
        <a href="{{route('backend.payments.index')}}" class="btn btn-danger float-end">Cancel</a>
    </div>
    <div class="my-5 mx-5">
        <form action="{{route('backend.payments.update',$payment->id)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}} <!-- database ထဲမှာ create လုပ်ဖို့ -->
            {{method_field('put')}}
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' :''}}" name="name" id="name" placeholder="" value="{{$payment->name}}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{$errors->first('name')}}
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="new_image-tab" data-bs-toggle="tab" data-bs-target="#new_image-tab-pane" type="button" role="tab" aria-controls="new_image-tab-pane" aria-selected="true">Old Image</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="old_image-tab" data-bs-toggle="tab" data-bs-target="#old_image-tab-pane" type="button" role="tab" aria-controls="old_image-tab-pane" aria-selected="false">New Image</button>
                    </li>                        
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="new_image-tab-pane" role="tabpanel" aria-labelledby="new_image-tab" tabindex="0">
                        <img src="{{$payment->image}}" alt="" class="w-25 h-25 my-3">
                        <!-- old image ကို hidden နဲ့ သယ်သွားရမယ်  -->
                        <input type="hidden" name="old_image" value="{{$payment->image}}">
                    </div>
                    <div class="tab-pane fade" id="old_image-tab-pane" role="tabpanel" aria-labelledby="old_image-tab" tabindex="0">
                        <input type="file" accept="image/*" class="form-control" name="new_image" id="new_image">
                    </div>                        
                </div>
            </div>        
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>    
</div>
@endsection