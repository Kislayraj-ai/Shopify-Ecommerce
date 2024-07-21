@extends('layouts.frontCustomize')  



@section('dashbaord_controls')

<style>
    .product_images{
        width:100% ;
        height:100%;
        
    }
    a{
        text-decoration:none ;
        color:#000;
    }
</style>

<article class="container">


  <h2>{{ $cat->category_name }}</h2>
    <div class="row">
        @foreach($data as $item)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                       <a href="{{ route('product.showSingleProductDetail',['id' =>  $item['product_id'] ]) }}" />
                        <div class="w-100 h-50 bg-danger mb-2">
                          
                        
                              @if($item['local'] == 1) 
                               <img class="product_images" src="{{ asset('storage/images/' . $item['product_image_path']) }}" width='70' class='img-thumbnail'>
   
                                {{-- <img class="product_images" src="storage/images/{{ $item['product_image_path'] }}"  width='70' class='img-thumbnail'> --}}
                               
                              @else
                                <img class="product_images" src="{{ $item['product_image_path'] }}">
                              @endif   

                          
                         </div>
                        <h5 class="card-title"> {{ $item['product_name'] }}</h5>
                        <h5 class="card-title d-flex"> {{ substr($item['product_description'] ,0,20 ) }}....<p class="text-primary">view</p></h5>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>   




</article>
@endsection
