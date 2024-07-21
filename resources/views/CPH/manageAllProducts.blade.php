@extends('layouts.app')


@section('cph_dashbaord_controls')

<style>
        body {
            font-family: Arial, sans-serif;
        }

        .tab {
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin: 5px;
        }

        .tab:hover {
           
        }
</style>

<div class="w-100" >

  <div class="card-body">
   <div class="container">
    <div class="row">


        <div class="col-md-2 col-sm-2 p-3 actionBoxTabCph">
         <a href="{{ route('product.product_category_mapping') }}" >Category Mapping</a>
        </div>

        <div class="col-md-2 col-sm-2 p-3 actionBoxTabCph">
        <a href="{{ route('product.create_product_stocks') }}" >Add Product Quantity</a>
        </div>


        <div class="col-md-2 col-sm-2 p-3 actionBoxTabCph">
        <a href="{{ route('product.viewProductList') }}" >View Products List</a>
        </div>


        <!-- Add more columns for additional tabs -->
    </div>
</div>

</div>
</div>

@endsection

@push('custom-page-scripts')
    
@endpush