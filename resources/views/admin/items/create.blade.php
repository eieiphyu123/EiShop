@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
    <div class="my-5">
        <h3 class="my-4 d-inline">Create Item</h3>
        <a href="{{route('backend.items.index')}}" class="btn btn-danger float-end">Cancel</a>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{route('backend.items.store')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}} <!-- database ထဲမှာ create လုပ်ဖို့ -->
                <div class="mb-3">
                    <label for="codeNo" class="form-label">CodeNo</label>
                    <input type="text" class="form-control {{$errors->has('codeNo') ?  'is-invalid' :''}}" name="codeNo" id="codeNo">
                    @if($errors->has('codeNo'))
                        <div class="invalid-feedback">
                            {{$errors->first('codeNo')}}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control {{$errors->has('name') ?  'is-invalid' :''}}" name="name" id="name">
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{$errors->first('name')}}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label d-block">Image</label>
                    <div class="input-group">                            
                        <input type="file" class="form-control {{$errors->has('image') ?  'is-invalid' :''}}" name="image" id="image">
                        @if($errors->has('image'))
                            <div class="invalid-feedback">
                                {{$errors->first('image')}}
                            </div>
                        @endif
                    </div>
                </div>        
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control {{$errors->has('price') ?  'is-invalid' :''}}" name="price" id="price">
                    @if($errors->has('price'))
                        <div class="invalid-feedback">
                            {{$errors->first('price')}}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="discount" class="form-label">Discount</label>
                    <input type="text" class="form-control {{$errors->has('discount') ?  'is-invalid' :''}}" name="discount" id="discount">
                    @if($errors->has('discount'))
                        <div class="invalid-feedback">
                            {{$errors->first('discount')}}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="instock" class="form-label">InStock</label>                    
                    <select class="form-select {{$errors->has('instock') ?  'is-invalid' :''}}" name="instock">                    
                        <option value="1" selected>Yes</option>
                        <option value="0">No</option>
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
                        <option value="">Choose Category</option>                        
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}} </option>
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
                    <textarea class="form-control {{$errors->has('description') ?  'is-invalid' :''}}" name="description" id="description" rows="3"></textarea>
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