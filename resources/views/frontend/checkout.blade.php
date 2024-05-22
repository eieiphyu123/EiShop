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
    <section class="py-5 container">        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <strong>My shopping Cart</strong>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>codeNo</th> 
                            <th>Name</th>                                                       
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Qty</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-grid gap-2">
            @if(Auth::user() && Auth::user()->role == 'User')
                <form action="" class="row" id="paymentForm" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <label for="paymentSlip" class="my-1"><strong>PaymentSlip</strong></label>
                            <input class="form-select" type="file" accept="image/*" name="paymentSlip">
                        </div>
                        <div class="col-md-6">
                            <label for="paymentMethod" class="my-1"><strong>PaymentMethod</strong></label>
                            <select class="form-select" name="paymentMethod" id="paymentMethod">
                                <option value="">Choose Payment Method</option>
                                @foreach($payments as $payment)
                                    <option value="{{$payment->id}}">{{$payment->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success my-5" id="orderNow">Order Now</button>
                    </form>
            @elseif(Auth::user() && (Auth::user()->role == "Admin" || Auth::user()->role == "Super Admin"))                
                <p class="text-danger text-center">Admin and Super Admin can not order.</p>
            @else
                <a href="/login" class="btn btn-primary">Login</a>
            @endif
        </div>
    </section>

    <!-- Order Success Modal -->
    <div class="modal" tabindex="-1" id="orderSuccessModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Order Success</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="text-center">
                <h1 class="text-success fs-1"><i class="bi bi-check-circle"></i></h1>
                <p>Your Order is Successful</p>
            </div>
        </div>
        <div class="modal-footer">
            <a href="/" class="btn btn-success">Ok</a>
            
        </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            // alert('hello');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // $('#orderNow').click(function(){
            //     // alert('hello');
            //     let shopString = localStorage.getItem('shopItems'); // jquery ထဲက localstorge name
            //     if(shopString){
            //         // $.post(url,data,callback)
            //         $.post("{{route('orderNow')}}",{data:shopString},function(res){
            //             console.log(res);
            //         })            
            //     }
            // })

            $('#paymentForm').on('submit',function(e){
                e.preventDefault();
                // alert("hello");
                let shopString = localStorage.getItem('shopItems');
                let formData = new FormData(this);
                // console.log(shopString,formData);
                formData.append('orderItems',shopString);

                $.ajax({
                    type: 'POST',
                    url: "{{route('orderNow')}}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // console.log(response);
                        if(response){
                            $('#orderSuccessModal').modal('show');
                            localStorage.removeItem('shopItems');
                        }
                    }
                })
            })
        });
    </script>
@endsection