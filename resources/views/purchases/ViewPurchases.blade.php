@extends('layouts.app')
@section('content')


<body class="hold-transition sidebar-mini">


<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="">view</a></li>

             </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
    
            </div>
              <!-- /.card-header -->
              
         <div class="card-body">
              <div class="col-sm-12">
                  <ol class="breadcrumb float-sm-right">
                    <input type="search"  id='search'class="form-control  " placeholder="Search" aria-label="Search"  />
                 </ol>
              </div>
             
 
         <table class="table table-bordered data-table  table-sm">
            <thead>
               <tr>
            
                     <th>id</th>
                     <th>  device</th>
                     <th>  user</th>
                     <th>created_at</th>
                     <th>updated_at</th>
 

      
                      </tr>
               </thead>
                <tbody>
                  <tr>
               
                  </tr>
                </tbody>
            
         </table>
       </div>
              <!-- /.card-body -->
            </div>
         
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
     
</body>
     
<script type="text/javascript">
     
  $(function () {
      
    var table = $('.data-table').DataTable({
        searching: false,
        processing: true,
        serverSide: true,
        ajax: {
           url:"{{route('purchases.view')}}" ,
          //  data: function (d) {
          //               d.category = $('#category').val(),
          //               d.search = $('#search').val()

          //    }
        },
        columns: [
                    {data: 'id', name: 'id'},
                    {data: 'device', name: 'device'},
                     {data: 'user', name: 'user'},
     
              

                     {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
 
        ]
    });
  
      
    // $('#search').keyup(function(){
    //           table.draw();
    //          });
    //          $('#category').change(function(){
    //       table.draw();
    //           });

        });
        
          
// $(".data-table").on('click', '.deleteRecord[data-id]', function (e) { 
//       e.preventDefault();
      
//       $('.show_confirm').click(function(event) {

//     swal({
//         title: `Are you sure you want to delete this record?`,
//         text: "If you delete this, it will be gone forever.",
//         icon: "warning",
//         buttons: true,
//         dangerMode: true,
//     })
//     .then((willDelete) => {
//       if (willDelete) {
//          var id = $(this).data("id");
//     var token = $("meta[name='csrf-token']").attr("content");
   
//     $.ajax(
//     {
//         url: "form/DeleteViewdevices/"+id,
//         type: 'DELETE',
//         data: {
//             "id": id,
//             "_token": token,
//         },
//         success: function (){
//             console.log("it Works");
 
//             $('.data-table').DataTable().ajax.reload();
//         }
//     });

//       }
//     });

    
//   });

    
// });
 

  </script>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>


</body>


@endsection
