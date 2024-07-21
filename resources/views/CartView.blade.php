@extends('layouts.frontCustomize')



@section('dashbaord_controls')

<style>
    #totalItemsInPrice {
    height: 1rem;
    background:transparent ;
    outline: none ;
    border:none ;
}

</style>

   <header style="background:#3A6B35;" class="text-white text-center py-3 ">
        <h1>My Cart</h1>
   </header>

{{-- {{ $cartData}} --}}
    <main class="container my-4 cartMainContainer">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3 appendCartData">
                    
                </div>
            </div>

            <div class="col-md-4 totalCartSummary">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                    <form method="post" action='{{ route('razor.MakeOrderCheckout') }}' id='checkoutCartSummary'>
                      @csrf
                        <h5 class="card-title">Cart Summary</h5>
                        <p class="card-text totalItemsInCart">Total Items: 2</p>
                        <p class="card-text totalItemsInPriceMain">Total Price: $35.00</p>
                        <button class="btn btn-primary cartCheckoutButton">Proceed to Checkout</button>

                    </form>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection


@push('custom-page-scripts')

<script>
  $(document).ready(function(){

    function fetchProductDetails() {
       $.ajax({
        method:"GET",
        url:"{{ route('cart.fetchCartData') }}" ,
        data:{_token:" {{ csrf_token() }}"},
        success:(data)=>{
          console.log(data)
        //! check the cart is empty
        if(data.length >  0) {

            let sData =    data.map((item)=>{
                let Image  ;
                if(item.local == 1){
                    Image = `<img src="{{ asset('storage/images/')}}/${item.product_image_path}" alt="Product image" class="card-img">` ;
                }else{
                     Image = `<img src="${item.product_image_path}" alt="Product image" class="card-img">` ;

                }

            return ` <div class="row no-gutters p-4">
                        <div class="col-md-4">
                            ${Image}
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">${item.product_name}</h5>
                                <p class="card-text">₹${parseFloat(item.price).toFixed(2)}</p>
                                
                                <div class="d-flex align-items-center">
                                     <button class="btn btn-outline-secondary increaseProductQuantity" style="width: 2rem; height: 2rem;" data-id=${item.id}>+</button>
                                     <p class="mx-2">${item.quantity}</p>
                                     <button class="btn btn-outline-secondary decreaseProductQuantity"  data-id=${item.id}  style="width: 2rem; height: 2rem;">-</button>
                                    </div>
                                    <button class="btn btn-danger remove-button mt-2" data-id=${item.id} ><i class="fa fa-trash"></i></button>
                                </div>
                        </div>
                    </div>`
           
           }).join(' ') ;

           const appendCartData = document.querySelector('.appendCartData');
           appendCartData.innerHTML = sData ;

            //! append cart starts summary 
            function AppendCartSummary(){
                
            //! Set up Cart Summaery 
             let TotalItemPrice = $(".totalItemsInPriceMain") ;
             let TotalItemCount = $(".totalItemsInCart") ;
            
             let TotalPrice     = 0.0; 
             let TotalItem = 0  ;
             data.forEach((item)=>{
               // console.log(item)
                 TotalItem += item.quantity ;

                TotalItemCount.html(`Total Items :   <input name='totalQuantity' id="totalItemsInPrice" readonly value='${TotalItem}'/>`)
                TotalPrice  += parseFloat(item.price)  * item.quantity ;
            })
              TotalItemPrice.html(`Total price : ₹<input name='totalValue' id="totalItemsInPrice" readonly value='${TotalPrice.toFixed(2)}'/>`) ;
              
            //! make order call
            $('.cartCheckoutButton').click(()=>{
                      //  console.log(data)
                        let ordersId = [] ;
                        data.forEach((item)=> 
                        ordersId.push(item.order_id)
                        )

                      //  console.log(ordersId)

                      $('#checkoutCartSummary').submit() ;

                     
                     
                  
                })
            }

            //! append cart ends here
            AppendCartSummary() ;

            function increaseDecreaseItemQuantity(productId,flag){
               $.ajax({
                method:"POST",
                url:"{{route('cart.increaseProductQuantity')}}",
                data:{flag:flag , product_id :productId ,quantity:1 , _token:"{{ csrf_token()}} " } ,
                success:(data)=>{
                        if(data){
                            fetchProductDetails()
                        }
                }
                
               })
            }
            const increaseProductQuantity = $('.increaseProductQuantity');
         
               increaseProductQuantity.click(function(e){
                      const productId = e.target.dataset.id ;
                          increaseDecreaseItemQuantity(productId, 0 )
                           AppendCartSummary()
                   })


              //! decrease the product quantity
            const decreaseProductQuantity = $('.decreaseProductQuantity');
                 decreaseProductQuantity.click(function(e){
                  const productId = e.target.dataset.id ;
                   increaseDecreaseItemQuantity(productId, 1 )
                      AppendCartSummary()
             

               
              })

           //! remove cart data 
           const removeCartProduct = $('.remove-button') ;
           removeCartProduct.click((e)=>{
                const productId = e.target.dataset.id ;
                $.ajax({
                    method:"POST" ,
                    url:"{{ route('cart.removeProductQuantity') }}" ,
                    data:{ productId : productId , _token: "{{ csrf_token() }}"} ,
                    success:(data) => {
                            if(data){
                                
                                location.reload();
                               // console.log("fetched here")
                            }
                    }

                })

           })
           

    
        
          }else{
                //! set cart summary none 
                $('.totalCartSummary').hide() ;
                $('.appendCartData').hide() ;

                const appendCartData = $('.cartMainContainer') ;
                const emptyCartTemplate = `<div class="container-fluid  mt-100">
				     <div class="row">
					<div class="col-md-12">
						<div class="card empthyCardMain">
						    <div class="card-header empthyCardMainheader">
						    <h5>Cart</h5>
						</div>
						<div class="card-body cart">
								<div class="col-sm-12 empty-cart-cls text-center">
									<img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
									<h3><strong>Your Cart is Empty</strong></h3>
									<h4>Add something to make me happy :)</h4>
									<a href="{{route('HomePage')}}" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a>
								</div>
						    </div>
				        </div>
						
					
					</div>
				 </div>
				</div>`
                appendCartData.append(emptyCartTemplate) ;
          }
              
             }
         })

    }

    //! fetch product added to cart
    fetchProductDetails() ;

  })

</script>

@endpush