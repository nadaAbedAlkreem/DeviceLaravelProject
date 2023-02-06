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
              <div class="card-footer clearfix">
                 
    
            </div>             
            
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
                     <th>RateType</th>
                     <th>customersName</th>

                    <th>StoreName</th>
                    <th>Rate</th>
 
                     <th>created_at</th>
                    <th>updated_at</th>
 

      
                      </tr>
               </thead>
                <tbody>
               
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
           url:"{{route('Reviews.view')}}" ,
           data: function (d) {
                         d.search = $('#search').val()

             }
        },
        columns: [
                    {data: 'id', name: 'id'},
                    {data: 'rateType', name: 'rateType'},
                    {data: 'customersName', name: 'customersName'},
                    {data: 'storeName', name: 'storeName'},
                    {data: 'rate', name: 'rate'},

                     {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
 
        ]
    });
    $('#search').keyup(function(){
              table.draw();
             });

        });
        
          
 
 

  </script>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>


</body>


@endsection
