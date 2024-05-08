@extends('layouts.admin')
@section('content')
    <!-- @php
        var_dump($payments)
    @endphp -->
    <div class="container-fluid px-4">
        <div class="my-5">
            <h3 class="my-4 d-inline">Payments</h3>
            <a href="{{route('backend.payments.create')}}" class="btn btn-primary float-end">Add Payments</a>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Payments DataTable
            </div>
            <div class="card-body">
                <table id="" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Payment Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Payment Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody id="payment_tbody">
                        @foreach($payments as $payment)
                        <tr>
                            <td>{{$payment->name}}</td>
                            <td><img src="{{$payment->image}}" alt="" class="w-25 h-25"></td>     
                            <td>
                                <a href="{{route('backend.payments.edit',$payment->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger delete" data-id="{{$payment->id}}">Delete</button>
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
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           Are you sure?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <form action="" method="POST" id="deleteForm">
                {{csrf_field()}}
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
        $('#payment_tbody').on('click','.delete',function(){
            // alert('hi');
            let id=$(this).data('id');
            // console.log(id);            
            $('#deleteForm').prop('action', 'payments/' + id);
            $('#deleteModal').modal('show');
        })
    })
</script>
@endsection