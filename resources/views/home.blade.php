@extends('layouts.frontCustomize')

@section('dashbaord_controls')
<style>
 a{
  text-decoration: none;
color:#000;
letter-spacing:0.2rem ;

}
.banner_image_home{
    width:100%;
    height:100%;
}
</style>

<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{
                         __('You are logged in!') 
                        }}
                </div>
            </div>
        </div>
    </div> --}}

</div>



    {{--! Personalized section here --}}
        {{--! BANNER --}}
<!-- Banner Section -->
<div class="bg-primary text-white text-center w-100" style="height:250px;">
    <img class="banner_image_home" src="{{asset('images/vecteezy_online-shopping-on-phone-buy-sell-business-digital-web_4299835.jpg') }}" />
</div>


    {{--!products --}}
    <h2 class="mb-5 w-100 mt-2 text-white p-2" style="background: #3A6B35;">Shop Now</h2>
  <article class="container m-4">



<div class="container-fluid">
   <ul class="list-unstyled justify-content-around d-flex flex-row w-100 categoriesListing">

    </ul>
</div>



    </article>

@endsection


@push('custom-page-scripts')

<script>
 //category.getAllCategoryListingForMapping
  $(document).ready(()=>{
     
     function appendCategoriesToListing(){
        const categoriesListing = $(".categoriesListing");
        
                    $.ajax({
                    method:"GET",
                    url:"{{ route('category.getAllCategoryMappingOneImage') }}" ,
                    data:{flag:1 ,  _token:'{{ csrf_token()  }}'},
                    success:(data)=>{
                        console.log(data)
                        let categpory_index = [] ;
                      // Use jQuery to loop through the array and append product names as options to the select dropdown
                      $.each(data, function (index, category) {
                           //  console.log(category)
             
                           let image = '' ;
                           if(category.is_local == 1){
                            image = '' ;
                                image =   `<img src="{{ asset('storage/images/${category.product_image}') }}"  style="height: 100%;" class="shadow mb-2 w-100" alt="Image Description">${category.category_name}</a></li>` ;
                           }else{
                                 image = '' ;
                                 image =   `<img src="${category.product_image}" style="height: 70%;" class="shadow mb-2 w-100" alt="Image Description">${category.category_name}</a></li>` ;
                           }
                                categpory_index.push(category.id)
                                categoriesListing.append(`<li  class="card p-2" categoryListitems style="width:15%;"><a href="{{ url('singleCategory') }}/${category.id}">
                                ${image}
                              `);
                      });
                    }
                })
     }
     appendCategoriesToListing()
    
  })
</script>
@endpush