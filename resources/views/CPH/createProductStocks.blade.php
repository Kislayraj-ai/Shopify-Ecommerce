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

    <form action="{{route('product.add_product_quantity')}}" method="POST"> 
    <h4>Add Product Stocks</h4>
     @csrf
        <div class="form-group">
            <label for="productSelect">Products </label>
            <select class="form-control" id="productSelect" name="product">
            </select>
        </div>

        <div class="form-group">
            <label for="categorySelect">Add Quantity </label>
           <input class='form-control' id="" name="stocks" />
        </div>

        <button type="submit" class="btn btn-primary productMapping">Submit</button>
    </form>
</div>



@endsection



@push('custom-page-scripts')
<script src="{{ asset('js/common.js') }}"></script>

<script>

    $(document).ready(()=>{
            
            const productSelectBox = $('#productSelect') ;
             let routeProduct = "{{ route('product.getAllProducts') }}" ;
         

             getProductListing(productSelectBox ,routeProduct) ;


    });

</script>
    
@endpush