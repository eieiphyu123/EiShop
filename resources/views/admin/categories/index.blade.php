@extends('layouts.admin')
@section('content')
    <!-- @php
        var_dump($categories)
    @endphp -->
    <div class="container-fluid px-4">
        <div class="my-5">
            <h3 class="my-4 d-inline">Categories</h3>
            <a href="{{route('backend.categories.create')}}" class="btn btn-primary float-end">Add Category</a>
        </div>                        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Categories DataTable
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Category Nmae</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tr>
                            <th>Category Nmae</th>
                            <th>Image</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>{{$category->image}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection