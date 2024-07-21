
@extends('layouts.frontCustomize')

@section('dashbaord_controls')

    <div class="container">
    @if(isset($message)){
    <div class="alert text-danger"><p>{{$message}}</p></div>
    }
    @endif
    <div class="billing-section">
            <div class="billing-header">
            <h2>Billing Details</h2>
        </div>
      <div class="d-flex">
        <div class="billing-details">
            {{--! Content Here  --}}
        </div>
        <div class="d-flex w-100">
        <table class="billing-items table table-bordered w-25">
            <thead>
                <tr>
                    <th>Quantity</th>
                    <th>Total Cart Value</th>
                </tr>
            </thead>
            <tbody id='billing_table_data'>
                <tr>
                    <td>$50.00</td>
                    <td>$100.00</td>
                </tr>

            </tbody>
        </table>


           <table class="products_table table table-bordered">
            <thead>
                <tr>
                    <th>Products</th>
                </tr>
            </thead>
            <tbody id='products_table_body'>
                {{-- <tr>
                    <td>$50.00</td>
                </tr> --}}
            </tbody>
        </table>


        </div>
     </div>

    <div class="card">
        <div class="billing-addresses mt-4">
            <div class="card-header">
                <h2>Available Addresses</h2>
            <div>

            <div class="card-body">
                <form>
                @php

                    $sFullAddress = ucwords($sFetchBillingAddress['area']) ." ," . ucwords($sFetchBillingAddress['city']) ." ," . ucwords($sFetchBillingAddress['state']) ." ,". $sFetchBillingAddress['zip_code'] ; 
                @endphp
              
                        <input  type="radio" id="billingAddressDetails" name="billingAddressDetails"  value="@php echo $sFullAddress @endphp" /> {{$sFullAddress}}
                </form>

                    <div class="billing-footer mt-2">
            <button class="btn btn-primary makepaymentFinal" id='makepaymentFinal'>Pay Now</button>
            </div>
            </div>
           
            </div>
        </div>
        </div>
        </div>


    
    </div>
</div>

@endsection

@push('custom-page-scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>

  $(document).ready(()=>{
       let key_id = 'rzp_test_fyGCysJ8dv2A08' ;
    let key_secret = '7Nqq2G5UtNDm4OGu1Q1fkJC1' ;
    let getEmail  ;
    let phoneNo ; let  username; 
    let getProductIds = [] ;

    const fetchProductData = ()=>{

       $.ajax({
        method:"GET",
        url:"{{ route('cart.fetchCartData') }}" ,
        data:{_token:" {{ csrf_token() }}"},
        success:(data)=>{
            console.log('data',data)
           const productTableContainer = $('#products_table_body');
            $.each(data,(index,val)=>{
                console.log(val)
                getProductIds.push(val.id) ;
                let templateForProduct = `<tr><td>${val.product_name}</td></tr>`;
                productTableContainer.append(templateForProduct);
            })
          }
       })
    }

fetchProductData() ;
  //! add  extra page details
    const fetchData = async()=>{
    await  $.ajax({
        method: "GET",
        url: "{{ route('user.GetSingleUserById') }}" ,
        data: {userId : "{{ session('user_id')}}" , _token: "{{ csrf_token()}}" } ,
        success:(data)=>{
           console.log("data " , data) ;
          getEmail = data.email ;
          phoneNo =  data.phoneno ;
          username = data.fname + " " + data.lname ;

    const billingDetailsUser =  $('.billing-details') ;
    const template  =  `
                    <div>
                <p><strong>Invoice No:</strong> INV-12345</p>
                <p><strong>Date:</strong>${(new Date())}</p>
            </div>
            <div>
                <p><strong>Customer:</strong>${username}</p>
                <p><strong>Email:</strong>${getEmail}</p>
            </div>` ;

    const billingTableData = $('#billing_table_data') ;
    const billingTemplate = `   <tr>
                    <td>{{  $sRaz->notes->quantity }}</td>
                    <td> ₹{{ $sRaz->amount/100 }}</td>
                </tr>` ;

    billingDetailsUser.html(template) ;
    billingTableData.html(billingTemplate) ;

        
   let  url =  "{{ route('razor.successPaymentDone') }}" ;
   var options = { 
            "key": key_id, 
            "amount": "{{ $sRaz->amount }}", 
            "currency": "INR",
            "name": "Self Learning", 
            "description": "Test Transaction",
            "image": "https://example.com/your_logo",
            "order_id": "{{ $sRaz->id }}", 
            "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
            "handler" : function(response){

                const quantity = "@php echo $sRaz->notes->quantity ;   @endphp" ;
                const amt   =    "@php echo $sRaz->amount/100 ;   @endphp" ;
                const address = $('#billingAddressDetails').val() ;
                 
              //  console.log("products",getProductIds ) ;
                response.quant = quantity ;
                response.amt = amt ;
                response.address = address ;
                $.ajax({
                    method:"POST" ,
                    url: url ,
                    data: {response , products :getProductIds  ,  _token:"{{csrf_token()}}"} ,
                    success:(data)=>{
                           window.location.href = 'openCartView' ;
                    }
                })
                //   window.location.href = url + '?payment_id=' + response.razorpay_payment_id  + '?mail=' + getEmail + '?user' + data.user_id ;
            },
            "prefill": { 
                "name": username , 
                "email": getEmail ,
                "contact": phoneNo 
            },
            "notes": {
                "address": "Razorpay Corporate Office"
            },
            "theme": {
                "color": "#3399cc"
            }
        };
             const  rzp1 = new Razorpay(options);
             document.getElementById('makepaymentFinal').onclick = function(e){
                let billingAddress = $('#billingAddressDetails') ;
                    if(!billingAddress.is(':checked')){
                        alert("Please Select the Address") ;
                        return false ;
                    }
                 rzp1.open();
                 e.preventDefault();
             }

        }
     }) 
   }

   fetchData() ;






  })

</script>
@endpush