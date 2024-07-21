<!-- resources/views/welcome.blade.php -->
@extends('layouts.app')

@section('cph_dashbaord_controls')

<div class="w-100" >

  <div class="card-body">
  <div class="container">
<div class="row w-100">
    {{-- <div class="col-md-4 col-sm-2 p-3 actionBoxTabCph"  > --}}
     <a class='class="col-md-4 col-sm-2 p-3 actionBoxTabCph' href="{{ route('category.manageCategory') }}"> 
    <i class="fas fa-folder-open"></i>
        Manage Categories    
        </a>  
    {{-- </div> --}}

     {{-- <div class="col-md-4 col-sm-2 p-3 actionBoxTabCph"  > --}}
          <a class='class="col-md-4 col-sm-2 p-3 actionBoxTabCph' href="{{ route('user.manageUser') }}" target="_blank">
     <i class="fa fa-users"></i>
        Users
        </a>
    {{-- </div> --}}

     {{-- <div class="col-md-4 col-sm-2 p-3 actionBoxTabCph"  > --}}
       <a class='class="col-md-4 col-sm-2 p-3 actionBoxTabCph'href="{{ route('category.addCategories') }}">
      <i class="fas fa-folder-plus"></i>
        Add Categories
        </a>
    {{-- </div> --}}

     {{-- <div class="col-md-4 col-sm-2 p-3 actionBoxTabCph"  > --}}
       <a class='class="col-md-4 col-sm-2 p-3 actionBoxTabCph'href ="{{route('product.openCreateProduct')}}" target="_blank" >
      <i class="fas fa-box"></i>  Add Products

        </a>
    {{-- </div> --}}

    
     {{-- <div class="col-md-4 col-sm-2 p-3 actionBoxTabCph"  > --}}
      <a class='class="col-md-4 col-sm-2 p-3 actionBoxTabCph' href="{{ route('product.manageAllProducts')}}"  target="_blank">
       <i class="fas fa-cubes"></i> Manage Products
      </a>
    {{-- </div> --}}

  </div>

</div>
  </div>
</div>
@endsection
