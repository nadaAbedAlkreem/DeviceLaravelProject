@extends('layouts.app')
@section('content')

 


<head>
  <title>Laravel - Dynamic autocomplete search using select2 JS Ajax-nicesnippets.com</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
 

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
                <a href="{{route('devices.form')}}" class="btn btn-sm btn-info float-left"  >
                new devices
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                 <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                 <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                 </svg>
               </a>
    
            </div>             
            
            </div>
              <!-- /.card-header -->
              
         <div class="card-body">
              <div class="col-sm-12">
                  <ol class="breadcrumb float-sm-right">
                    <input type="search"  id='search'class="form-control  " placeholder="Search" aria-label="Search"  />
                 </ol>
              </div>
              <div class="form-group">
                <label><strong>category :</strong></label>
                <!-- <select id='category' class="form-control" style="width: 200px">
                        <option value="-1" >all </option>
                     @if(!empty($data))
                          @foreach($data as $item)
                          @if($item->level <> 0)
                          <option value="{{$item->id}}" >{{$item->name}}</option>
                           @endif
                          @endforeach                         
                        @endif
                </select> -->
                <select class="itemName form-control"   id='category'  style="width: 200px"  name="itemName"></select>

               </div>
 
         <table class="table table-bordered data-table  table-sm">
            <thead>
               <tr>
            
                     <th>id</th>
                     <th>name</th>
                     <th>code</th>
                     <th>price</th>
                     <th>Quantity</th>
                     <th>description</th>
                     <th>image	</th>
                     <th>created_at</th>
                     <th>action</th>


      
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
       $('.itemName').select2({
  placeholder: 'Select an item',
  ajax: {
    url: '/select2-autocomplete-ajax-device',
    dataType: 'json',
    delay: 250,
    processResults: function (data) {
      return {
        results:  $.map(data, function (item) {
              return {
                  text: item.name,
                  id: item.id
              }
          })
      };
    },
    // cache: true
  }
});
  $(function () {
      
    var table = $('.data-table').DataTable({
        searching: false,
        processing: true,
        serverSide: true,
        pageLength: 5 , 
         ajax: {
           url:"{{route('devices.view')}}" ,
           data: function (d) {
            //id="select2-category-container"
                        d.category = $('#category').val(),
                        // alert($('#category').val());

                        d.search = $('#search').val()
 
             }
        },
        columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'code', name: 'code'},
                    {data: 'price', name: 'price'},
                    {data: 'Quantity', name: 'Quantity'},
                    {data: 'description', name: 'description'},
                    {data: 'image', name: 'image'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action',     name: 'action', orderable: false, searchable: false}

        ]
    });
  
      
           $('#search').keyup(function(){
                 table.draw();
                });
                //id="select2-category-results"
             $('.select2-results__option').click(function(event){
              console.log('test');
                  table.draw();
                  alert('test');
              });

        });
        
          
$(".data-table").on('click', '.deleteRecord[data-id]', function (e) { 
      e.preventDefault();
      
      $('.show_confirm').click(function(event) {

    swal({
        title: `Are you sure you want to delete this record?`,
        text: "If you delete this, it will be gone forever.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
         var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
   
    $.ajax(
    {
        url: "form/DeleteViewdevices/"+id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (){
            console.log("it Works");
 
            $('.data-table').DataTable().ajax.reload();
        }
    });

      }
    });

    
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
