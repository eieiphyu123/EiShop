@extends('layouts.admin')
@section('content')
    <!-- @php
        var_dump($items)
    @endphp -->
    <div class="container-fluid px-4">
        <div class="my-5">
            <h3 class="my-4 d-inline">Items</h3>
            <a href="{{route('backend.items.create')}}" class="btn btn-primary float-end">Add Item</a>
        </div>               
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Items DataTable
            </div>
            <div class="card-body">
                <table id="" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>codeNo</th>
                            <th>Item Nmae</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Instock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tr>
                            <th>codeNo</th>
                            <th>Item Nmae</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Instock</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody id="item_tbody">
                        @foreach($items as $item)
                        <tr>
                            <td>{{$item->codeNo}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->price}} MMK</td>
                            <td>{{$item->discount}} MMK</td>
                            <td>{{$item->instock}}</td>
                            <td>
                                <a href="" class="btn btn-sm btn-warning">Edit</a>
                                <button class="btn btn-sm btn-danger delete" type="button" data-id="{{$item->id}}">Delete</button>
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
            <div class="modal-header bg-danger text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Modal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure to delete this item?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <form action="" method="POST" id="deleteForm">
                    {{csrf_field()}}
                    <!-- destroy method ကို ခေါ်ဖို့ DELETE ကို dmethod_field('delete') သုံးရမယ် -->
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
            $('#item_tbody').on('click','.delete', function(){
                // alert('Hello');                

                let id=$(this).data('id');
                // console.log(id);
                
                $('#deleteForm').prop('action','items/'+id);

                $('#deleteModal').modal('show');                
            })
        });
    </script>
@endsection