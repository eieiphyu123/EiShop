@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
    <div class="my-5">
        <h3 class="my-4 d-inline">Create Category</h3>
        <a href="{{route('backend.categories.index')}}" class="btn btn-danger float-end">Cancel</a>
    </div>
    <div class="card mb-4">
        <div class="card-body">   
            <form action="{{route('backend.categories.store')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label d-block">Image</label>
                    <div class="input-group">                            
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form> 
        </div> 
    </div>    
</div>
@endsection