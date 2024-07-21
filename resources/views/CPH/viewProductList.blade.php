@extends('layouts.app')



@section('cph_dashbaord_controls')

<div class="container">
    <div class="container mt-5">
   
   
  <nav class="navbar navbar-expand-lg" style="background:rgba(0,0,0,0.2);">
    <div class="container-fluid">
      <!-- Brand/logo -->
           <p class='cph_header_list_name'>Product List</p>
        <!-- Navbar links aligned to the right -->
         <div class="navbar-nav ml-auto">
       <button class="btn btn-info" id='exportProductData'>Export </button>
        </div>
        </div>
    </nav>
    <table class="table table-bordered">

        <thead>
            <tr>
                <th scope="col">Sr No</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Description</th>
                <th scope="col">Price</th>
                 <th scope="col">Stocks</th>
                <th scope="col">Online Date</th>
      
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody id='productTable'>

            <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>


</div>

@endsection




@push('custom-page-scripts')
<script>
    $(document).ready(function(){

            $('#exportProductData').click(()=>{

                window.location.href = "{{ route('excel.exportProductList') }} " ;
            })

        const getAllUsersList = ()=>{

            let productTable = $('#productTable') ;

                $.ajax({
                method:"GET",
                url:"{{ route('product.getProductListData')}}",
                success:(data)=>{
                  let productList = data ;
                   $.each(productList , function(index,val){
                      console.log(val) ;
                        let tableData = `<tr>
                             <td>${index + 1}</td>
                             <td>${val.product_name}</td>
                             <td>${val.product_description}</td>
                             <td>${val.product_price}</td>
                             <td>${val.stocks  ? val.stocks :  0}</td>
                            <td>${val.product_online_date }</td>
                             <td>
                                 <!-- Add buttons or links for actions (edit, delete, etc.) -->        
                                 <button class="btn btn-danger btn-sm">Freeze</button>
                             </td>
                         </tr>`
                         productTable.append(tableData) ;
                   })
                 }
                })
                
            
        }
        getAllUsersList() ;

    })

</script>
@endpush