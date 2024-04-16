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
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Payment Name</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Payment Name</th>
                            <th>Image</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($payments as $payment)
                        <tr>
                            <td>{{$payment->name}}</td>
                            <td>{{$payment->image}}</td>                                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection