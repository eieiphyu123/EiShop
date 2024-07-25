@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
    <div class="my-5">
        <h3 class="my-4 d-inline">Edit Item</h3>
        <a href="{{route('backend.items.index')}}" class="btn btn-danger float-end">Cancel</a>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{route('backend.items.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}} <!-- database ထဲမှာ create လုပ်ဖို့ -->
                {{method_field('put')}}
                <div class="mb-3">
                    <label for="codeNo" class="form-label">CodeNo</label>
                    <input type="text" class="form-control {{$errors->has('codeNo') ?  'is-invalid' :''}}" name="codeNo" id="codeNo" value="{{$item->codeNo}}">
                    @if($errors->has('codeNo'))
                        <div class="invalid-feedback">
                            {{$errors->first('codeNo')}}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control {{$errors->has('name') ?  'is-invalid' :''}}" name="name" id="name" value="{{$item->name}}">
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{$errors->first('name')}}
                        </div>
                    @endif
                </div>
                {{-- Image --}}
                <div class="mb-3">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="old_image-tab" data-bs-toggle="tab" data-bs-target="#old_image-tab-pane" type="button" role="tab" aria-controls="old_image-tab-pane" aria-selected="true">Old Image</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="new_image-tab" data-bs-toggle="tab" data-bs-target="#new_image-tab-pane" type="button" role="tab" aria-controls="new_image-tab-pane" aria-selected="false">New Image</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="old_image-tab-pane" role="tabpanel" aria-labelledby="old_image-tab" tabindex="0">
                            <img src="{{ $item->image }}" alt="" class="w-25 h-25 my-3">
                            <input type="hidden" name="old_image" value="{{ $item->image }}">
                        </div>
                        <div class="tab-pane fade" id="new_image-tab-pane" role="tabpanel" aria-labelledby="new_image-tab" tabindex="0">
                            <input type="file" accept="image/*" class="form-control {{ $errors->has('new_image') ? 'is-invalid' : '' }}" name="new_image" id="new_image">
                            @if ($errors->has('new_image'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('new_image') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- <div class="mb-3">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="old_image-tab" data-bs-toggle="tab" data-bs-target="#old_image-tab-pane" type="button" role="tab" aria-controls="old_image-tab-pane" aria-selected="true">Old Image</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="new_image-tab" data-bs-toggle="tab" data-bs-target="#new_image-tab-pane" type="button" role="tab" aria-controls="new_image-tab-pane" aria-selected="false">New Image</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="old_image-tab-pane" role="tabpanel" aria-labelledby="old_image-tab" tabindex="0">
                            <img src="{{$item->image}}" alt="" class="w-25 h-25 my-3">
                            <!-- old image ကို hidden နဲ့ သယ်သွားရမယ်  -->
                            <input type="hidden" name="old_image" value="{{$item->image}}">
                        </div>
                        <div class="tab-pane fade" id="new_image-tab-pane" role="tabpanel" aria-labelledby="new_image-tab" tabindex="0">
                            <input type="file" accept="image/*" class="form-control" name="new_image" id="new_image">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control {{$errors->has('price') ?  'is-invalid' :''}}" name="price" id="price" value="{{$item->price}}">
                    @if($errors->has('price'))
                        <div class="invalid-feedback">
                            {{$errors->first('price')}}
                        </div>
                    @endif
                </div> --}}
                {{-- Discount --}}
                <div class="mb-3">
                    <label for="discount" class="form-label">Discount</label>
                    <input type="text" class="form-control {{$errors->has('discount') ?  'is-invalid' :''}}" name="discount" id="discount" value="{{$item->discount}}">
                    @if($errors->has('discount'))
                        <div class="invalid-feedback">
                            {{$errors->first('discount')}}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="instock" class="form-label">InStock</label>
                    <select class="form-select {{$errors->has('instock') ?  'is-invalid' :''}}" name="instock" value="">
                        <option value="1" {{$item->instock==1?'selected':''}} selected>Yes</option>
                        <option value="0" {{$item->instock==0?'selected':''}}>No</option>
                    </select>
                    @if($errors->has('instock'))
                        <div class="invalid-feedback">
                            {{$errors->first('instock')}}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select {{$errors->has('category_id') ?  'is-invalid' :''}}" name="category_id">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{$item->category_id==$category->id ? 'selected' : ''}}>{{$category->name}} </option>
                        @endforeach
                    </select>
                    @if($errors->has('category_id'))
                        <div class="invalid-feedback">
                            {{$errors->first('category_id')}}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control {{$errors->has('description') ?  'is-invalid' :''}}" name="description" id="description" rows="3" value="">{{$item->description}}</textarea>
                    @if($errors->has('description'))
                        <div class="invalid-feedback">
                            {{$errors->first('description')}}
                        </div>
                    @endif
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
