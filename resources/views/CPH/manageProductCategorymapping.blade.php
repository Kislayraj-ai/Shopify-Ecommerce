@extends('layouts.app')


@section('cph_dashbaord_controls')
<style>


        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }
</style>

<div class="container">

    <form>
    <h4>Product Category Mapping</h4>
        <div class="form-group">
            <label for="productSelect">Products </label>
            <select class="form-control" id="productSelect" name="products">
            </select>
        </div>

        <div class="form-group">
            <label for="categorySelect">Category </label>
            <select class="form-control" id="categorySelect" name="category">

                <!-- Add more category options as needed -->
            </select>
        </div>

        <button type="button" class="btn btn-primary productMapping">Submit</button>
    </form>
</div>



@endsection



@push('custom-page-scripts')
<script src="{{ asset('js/common.js') }}"></script>

<script>

    $(document).ready(()=>{
            
            const productSelectBox = $('#productSelect') ;
            let routeProduct = "{{ route('product.getAllProductsListingForMapping') }}" ;
         

            const getCategoryListing = ()=>{
                const catSelectBox = $('#categorySelect') ;
                    $.ajax({
                    method:"GET",
                    url:"{{ route('category.getAllCategoryListingForMapping') }}" ,
                    data:{_token:'{{ csrf_token()  }}'},
                    success:(data)=>{
                        
                       // Use jQuery to loop through the array and append product names as options to the select dropdown
                       $.each(data, function (index, category) {
                           catSelectBox.append(`<option value='${category.id}'>${category.category_name}</option>`);
                       });
                    
                    }
                })
            }

            getProductListing(productSelectBox ,routeProduct ,true) ;
            getCategoryListing();

        const addProductCategorymapping  =() =>{
            const productId  = $('#productSelect').val();
            const categoryId = $('#categorySelect').val();


            $.ajax({
                method:"POST",
                url:"{{ route('product.insertProductCategoryMapping') }}",
                data:{product_id:productId , category_id:categoryId , _token: "{{ csrf_token() }}"  },
                success : (data) =>{
                    if(data){
                        alert("Product Mapped");
                        location.reload();
                        
                    }
                }
            })
        }

        const checkProductQuantity  =() =>{
            
            let quant = 0 ;
            const productId  = $('#productSelect').val();
            // const categoryId = $('#categorySelect').val();
                $.ajax({
                method:"POST",
                url:"{{ route('product.checkQuantity') }}",
                data:{product_id:productId , _token: "{{ csrf_token() }}"  },
                success : (data) =>{
                    if(data.length > 0){
                        console.log("Prod ",data)
                    let getProductStocks = data[0].stocks ;
                    if( parseInt(getProductStocks) > 0){
                        //! add the Mapping
                        addProductCategorymapping() ;
                    }
                    else{
                        alert('Please add the Product Stocks') ;
                        return false ;
                    }
                }else{
                        alert('Please add the Product Stocks') ;
                        return false ;
                    }
                }
            })
        }

        $('.productMapping').click(()=>{

            checkProductQuantity();
        
        })
       // 

    });

</script>
    
@endpush