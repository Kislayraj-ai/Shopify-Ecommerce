@extends('layouts.app')


@section('cph_dashbaord_controls')
<div class="container mt-5  w-50">


  <nav class="navbar navbar-expand-lg" style="background:rgba(0,0,0,0.2);">
    <div class="container-fluid">
      <!-- Brand/logo -->
           <p class='cph_header_list_name'>Category List</p>
        <!-- Navbar links aligned to the right -->
         <div class="navbar-nav ml-auto">
         <div class="d-flex w-50 gap-2">
         <a class="btn btn-secondary" href="cph_dashboard">Back</a>
       <button class="btn btn-info" id='exportProductData'>Export </button>
       </div>
        </div>
        </div>
    </nav>
    <div class="card">
        <div class="card-header">
            <h2>Category</h2>
        </div>
        <div class="card-body">
            <form class="form w-50" action="{{route('category.createCategories') }}" >
                <div class="form-group mb-2">
                    <label for="category_name">Type Category</label>
                    <input type="text" class="form-control" name="category_name" >
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>

@endsection