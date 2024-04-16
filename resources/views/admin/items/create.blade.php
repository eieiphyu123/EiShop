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
                    <input type="text" class="form-control" name="codeNo" id="codeNo">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label d-block">Image</label>
                    <div class="input-group">                            
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                </div>        
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="discount" class="form-label">Discount</label>
                    <input type="text" class="form-control" name="discount" id="discount" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="instock" class="form-label">InStock</label>
                    <select class="form-select" name="instock">
                        <option value="1" selected>Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" name="category_id">
                        <option selected>Choose Category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>    
</div>
@endsection