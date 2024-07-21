@extends('layouts.frontCustomize')




@section('dashbaord_controls')

<div class="container">



    <div class="row">
        <!-- Product Image and Gallery -->
        <div class="col-md-6">
            <div id="productGallery" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active mainImageContainer1">
                        {{-- <img src="" id="single_product_image1" class="d-block w-100" alt="Product Image 1"> --}}
                    </div>
                    <div class="carousel-item mainImageContainer2">
                        {{-- <img src="" id="single_product_image2" class="d-block w-100" alt="Product Image 2"> --}}
                    </div>
                    <!-- Add more carousel items as needed -->
                </div>
                <a class="carousel-control-prev" href="#productGallery" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#productGallery" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        {{--! Product Information  --}}
        <div class="col-md-6">
            <h2 id="single_product_name">Product Name</h2>
            {{-- <p class="text-muted">N/A</p> --}}
        
            <p id="single_product_price"><strong>Price:</strong> $99.99</p>

            <!-- Call to Action -->
            <div class="mb-3">
                <button class="btn btn-primary" id="singleProductAddToCart" class="singleProductAddToCart">Add to Cart</button>
                <button class="btn btn-warning" id="singleProductGoToCart" style= "display:none;"  class="singleProductGoToCart">View Cart</button>

            </div>

            <!-- Product Reviews -->
            <div>
                <h6>Customer Reviews</h6>
                <p class="text-warning">★★★★☆ 4.0 (24 reviews)</p>
                <!-- Add more review details as needed -->
            </div>
        </div>
    </div>

    <!-- Additional Information Tabs -->
    <ul class="nav nav-tabs mt-4" id="productTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="specs-tab" data-toggle="tab" href="#specs" role="tab" aria-controls="specs" aria-selected="true">Specifications</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="shipping-tab" data-toggle="tab" href="#shipping" role="tab" aria-controls="shipping" aria-selected="false">Shipping</a>
        </li>
        <!-- Add more tabs as needed -->
    </ul>

    <div class="tab-content mt-3" id="productTabsContent">
        <div class="tab-pane fade show active" id="specs" role="tabpanel" aria-labelledby="specs-tab">
            <p id="single_product_description"></p>
        </div>
        <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
            <p>Shipping information goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <!-- Add more tab panes as needed -->
    </div>

    <!-- Related Products Section -->
    {{-- <div class="mt-5">
        <h3>Related Products</h3>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <img src="related-product1.jpg" class="card-img-top" alt="Related Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Related Product 1</h5>
                        <p class="card-text">$79.99</p>
                        <button class="btn btn-primary">View Details</button>
                    </div>
                </div>
            </div>
            <!-- Add more related product cards as needed -->
        </div>
    </div> --}}
</div>

@endsection


@push('custom-page-scripts')
    <script>
    
    $(document).ready(()=>{

        $('#singleProductGoToCart').click(()=>{
            window.location.href = "{{route('cart.openCart')}}"
        });

     const appendProductDataToPage = ()=>{

        let data = @json($productData);
        
        let productData =  data ;
        data = data[0];
        let singleProductName = $('#single_product_name');
        let singleProductPrice = $('#single_product_price');
        singleProductName.text(data.product_name);
        singleProductPrice.html(` <strong>Price : ₹${data.product_price}</strong>`);


           
        let singleProductImage1  = $('.mainImageContainer1') ;
        let singleProductImage2 =  $('.mainImageContainer2') ;
        let singleProductDesc = $('#single_product_description');

    

    //! append the image files
     productData.forEach((item)=>{
 
        let template1 ;
        let template2 ;
         if(item.local == 1){
            console.log("Tst");
           template1 = `<img src='{{ asset("storage/images/") }}/${item.product_image_path}' class="d-block w-100" alt="Image" >`;
           template2 = `<img src='{{ asset("storage/images/") }}/${item.product_image_path}' class="d-block w-100" alt="Image" >`;

          }else{
             template1 = `<img src='${item.product_image_path}' class="d-block w-100" alt="Image" >`;
            template2 = `<img src='${item.product_image_path}' class="d-block w-100" alt="Image" >`;
          }

            singleProductImage1.html('') ;
            singleProductImage2.html('') ;

            singleProductImage1.append(template1) ;
            singleProductImage2.append(template2) ;
            
    })

    singleProductDesc.text(data.product_description)


    //! check for the 
    console.log(productData)
     const lenghtOfProduct = productData.length ;
      let LastAddedData = productData[lenghtOfProduct - 1];
     if( LastAddedData.deleted_at === null && LastAddedData.quantity > 0 ){
                $('#singleProductAddToCart').css({
                    'display': 'none',
                
                      });

                      $('#singleProductGoToCart').css({
                    'display': 'block',
                
                      });
     }else{
        $('#singleProductAddToCart').css({
                    'display': 'block',
                
                      });

                      $('#singleProductGoToCart').css({
                    'display': 'none',
                
                      });
     }

     }

     appendProductDataToPage();


    const addProductToCart = () =>{
        const addToCartBtn = $('#singleProductAddToCart') ;
           let data = @json($productData);
            data = data[0];
        
        addToCartBtn.click(()=>{
            console.log(data)
            let prodiuctId = data.id ;
            let productPrice = data.product_price;
            let category = data.category_id;
            let quantity = 1 ;
            let AddedBy = 1 ;
            let cartData = 
                {
                    product:prodiuctId,
                    category:category ,
                    price:productPrice,
                    quantity:quantity,
                    added_by:AddedBy
                 

                } ;
            
           $.ajax({
                method:"POST",
                url:"{{route('cart.addPoriductToCart') }}",
                data: {cartData ,    _token:"{{ csrf_token() }}" } ,
                success:(data)=>{
                   if(data){
                    
                   addToCartBtn.css({
                    'display': 'none',
                
                      });

                      $('#singleProductGoToCart').css({
                    'display': 'block',
                
                      });


                   }
                }
            })

        })


    }
    addProductToCart()



    })
    
    
    </script>
@endpush