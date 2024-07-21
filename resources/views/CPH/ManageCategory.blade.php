@extends('layouts.app')


@section('cph_dashbaord_controls')
<div class="container mt-5">


  <nav class="navbar navbar-expand-lg" style="background:rgba(0,0,0,0.2);">
    <div class="container-fluid">
      <!-- Brand/logo -->
           <p class='cph_header_list_name'>Category List</p>
        <!-- Navbar links aligned to the right -->
         <div class="navbar-nav ml-auto">
       <button class="btn btn-info" id='exportProductData'>Export </button>
        </div>
        </div>
    </nav>
    <table class="table table-bordered">

  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
        <th>Sr No</th>
          <th>Category Name</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      @foreach($categoryData as $key => $value)
        
   
        <tr>
           <td> {{ $key + 1  }} </td>
           <td> {{ $value->category_name }} </td>
           <td> 
           <button class="btn btn-info editCategoryModel" data-id="{{ $value->id }}">Edit</button>

             @if($value->deleted_at != NULL)
               <button class="btn btn-secondary freezeCategoryModel" disabled data-id="{{ $value->id }}">UnFreeze</button>
              @else
                <button class="btn  btn-danger freezeCategoryModel"  data-id="{{ $value->id }}">Freeze</button>
             @endif
            
          
            </td>
       
        </tr>
    @endforeach
      </tbody>
    </table>
  </div>

  {{--! category edit model  --}}
<!-- The Bootstrap Modal -->
<div class="modal" id="myCategoryModel" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Category</h5>
        
      </div>
      <div class="modal-body">
        <form clas="form-control">
          <input class="form-control" id="modelCategoryInput" />
          <input class="form-control" hidden id="modelCategoryInputId" value="" />
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary updateCategory" data-dismiss="modal">Update</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection


@push('custom-page-scripts')
  <script>
    
    $(document).ready(()=>{
      
      const editCategory =  (id) =>{
        $.ajax({
          method:"GET",
          url:"getCategoryById" ,
            data:{categoryId:id } ,
            success:(data)=>{
            console.log(data)
            let modelInputField = $('#modelCategoryInput') ;
            let modelInputFieldId = $('#modelCategoryInputId') ;

            modelInputField.val(data.category_name) ;
            modelInputFieldId.val(data.id) ;

            $("#myCategoryModel").modal("show")
           
          }
        });
      }


      $('.editCategoryModel').click((e)=>{
        const catId =  parseInt(e.target.dataset.id) ;
        editCategory(catId) ;
      })


    $('.updateCategory').click(()=>{
         let modelInputFieldId = $('#modelCategoryInputId').val() ;
         let modelInputField = $('#modelCategoryInput').val() ;

         $.ajax({
          method:"POST",
          url:"updateCategoryById" ,
          data:{categoryId:modelInputFieldId , updatedName:modelInputField,  _token: "{{ csrf_token() }}", } ,
            success:(data)=>{
            if(data){
            $("#myCategoryModel").modal("hide")
            location.reload();
            }
           
          }
        });
     })


      $('.freezeCategoryModel').click((e)=>{
         
             const categoryIdId =  parseInt(e.target.dataset.id) ;

         $.ajax({   
          method:"POST",
          url:"frezeCategorybyId" ,
          data:{categoryId:categoryIdId  , _token: "{{ csrf_token() }}", } ,
            success:(data)=>{
            if(data){
            $("#myCategoryModel").modal("hide")
            location.reload();
            }
           
          }
        });
     })
    })

  
  </script>
@endpush