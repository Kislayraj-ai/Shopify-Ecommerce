@extends('layouts.app') 


@section('cph_dashbaord_controls')

<style>
.form-group{
  margin-bottom:2rem;
}
.control-label {
    text-transform: capitalize;
}

.custom-file-input {
  position: relative;
  display: inline-block;
}

.input-file {
  display:none ;
}
input{
  width:70% ;
}
.custom-file-input label {
  background-color: #3498db; 
  color: #fff;
  padding: 10px 15px;
  border-radius: 5px;
  cursor: pointer;
  display: inline-block;
}

/* Optionally, style the label to give it a hover effect */
.custom-file-input label:hover {
  background-color: #2980b9; /* Choose your desired hover background color */
}

.mainProductAddContainer{
      margin:  auto;
      width:100vw ;
      display: flex;
      justify-content: center;
      align-items: center;

}

</style>


<article class="mainProductAddContainer">
<div class="w-75">

<form class="form-horizontal form-control w-75" id ="productDataInput"  >
<fieldset>

<!-- Form Name -->
<legend>Add Product Data</legend>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-8 control-label" for="product_name">product names</label>  
  <div class="col-md-8">
  <input id="product_name" name="product_name"  class="form-control " required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-8 control-label" for="product_name_fr">product description </label>  
  <div class="col-md-8">
  <input id="product_name_fr" name="product_description" class="form-control " type="text">
    
  </div>
</div>




<!-- Textarea -->
<div class="form-group">
  <label class="col-md-8 control-label" for="product_description">product price</label>
  <div class="col-md-8">                     
   <input type="text"  name="product_price"  class="form-control " />
  </div>
</div>




<!-- Text input-->
<div class="form-group">
  <label class="col-md-8 control-label" for="online_date">online date</label>  
  <div class="col-md-8">
  <input id="online_date" name="product_online_date" type="date" class="form-control" required="" type="text">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">

 <!-- File Button --> 
<div class="form-group">
  {{-- <label class="col-md-8 control-label" for="filebutton">Upload Image</label> --}}
<div class="custom-file-input">
  <input id="filebutton" name="product_image_path" class="input-file" type="file">
  <label for="filebutton">Choose File</label>
</div>
</div>



<!-- Button -->
<div class="col-md-8">
    <button id="submitProductData" type="button" name="submitProductData"  class="btn btn-primary">Create Product</button>
  </div>

</fieldset>
</form>
  
  </div>
</div>


</article>
@endsection

@push('custom-page-scripts')

<script>

$(document).ready(function(){

 //! add product data
  $('#submitProductData').click(()=>{

    const form = document.getElementById('productDataInput');

    // Create FormData object
    const  formData = new FormData(form);


      formData.append('_token', '{{ csrf_token() }}');

    $.ajax({
        method: "POST",
        url: "{{ route('product.addProductDataFromCPH') }}",
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            // Handle success
            if(data){
                
               alert("Product Added Successfully") ;
               location.reload();
            }
        },
        error: function (error) {
            // Handle error
            console.error('There was an error!', error);
        }
      });
    })
  })

</script>
@endpush 