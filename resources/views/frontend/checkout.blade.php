@extends('layouts.frontend')
@section('content')
    <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Check Out</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div>
            </div>
        </header>

        <!-- Check Out Section -->
        <section class="py-5">
            <div class="showTable">
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
                            <th>Name</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Action</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tr>
                            <th>codeNo</th>
                            <th>Nmae</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Action</th>
                            <th>Total</th>
                        </tr>
                    </tfoot>
                    <tbody id="tbody">
                        
                    </tbody>
                </table>
            </div>
            </div> 
                <a id="order" href="{{route('front.index')}}" class="btn btn-outline-primary my-3 mx-5">Order Now</a>   
            </div>
        </section>
@endsection