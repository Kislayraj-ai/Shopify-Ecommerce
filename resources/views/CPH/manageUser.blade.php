@extends('layouts.app')

@section('cph_dashbaord_controls')

<div class="container">

  <nav class="navbar navbar-expand-lg" style="background:rgba(0,0,0,0.2);">
    <div class="container-fluid">
      <!-- Brand/logo -->
    <p class='cph_header_list_name'>User List</p>
        <!-- Navbar links aligned to the right -->
         <div class="navbar-nav ml-auto">
       <button class="btn btn-info" id='exportUserData'>Export </button>
        </div>
        </div>
    </nav>
 <table class="table table-bordered" style="background-color: rgba(255, 255, 255, 0.8);" >
        <thead>
            <tr>
                <th>Sr No</th>
                <th>User Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Address</th>
                <th>DOB</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="userTable">

           
        </tbody>
    </table>

</div>
@endsection



@push('custom-page-scripts')
<script>
    $(document).ready(function(){

            $('#exportUserData').click(()=>{

                window.location.href = "{{ route('excel.exportUsersList') }} " ;
            })

        const getAllUsersList = ()=>{

            let userTable = $('#userTable') ;
            $.ajax({
                method:"GET",
                url:"{{ route('user.getAllUsersList')}}",
                success:(data)=>{
                    let userList = data;
                   $.each(userList , function(index,val){
                      console.log(val)
                        let tableData = `<tr>
                             <td>${index + 1}</td>
                             <td>${val.fname} ${val.lname}</td>
                             <td>${val.phoneno}</td>
                             <td>${val.email}</td>
                             <td>${val.address}</td>
                             <td>${val.dob}</td>
                             <td>
                                 <!-- Add buttons or links for actions (edit, delete, etc.) -->        
                                 <button class="btn btn-danger btn-sm">Freeze</button>
                             </td>
                         </tr>`
                         userTable.append(tableData) ;
                   })
                }
            })
        }
        getAllUsersList() ;

    })

</script>
@endpush