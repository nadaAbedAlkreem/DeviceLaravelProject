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
              <li class="breadcrumb-item"><a href="#">view</a></li>

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
                <a href="{{route('category.form')}}" class="btn btn-sm btn-info float-left"  >
                new category
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
                <select id='category' class="form-control" style="width: 200px">
                        <option value="-1" >all </option>
                     @if(!empty($data))
                          @foreach($data as $item)
                          @if($item->level ==  0)
                          <option value="{{$item->id}}" >{{$item->name}}</option>
                           @endif
                          @endforeach                         
                        @endif
                </select>
            </div>
            
            
                <table class="table table-bordered data-table">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>name</th>
                     <th>created_at</th>
                    <th>updated_at</th>
                    <th>action</th>

                   </tr>
                  </thead>
                  <tbody>
                  <tr>
               
                  </tr>
            
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
 
<script type="text/javascript">
 
        $(function () {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                pagingType: 'full_numbers',
                pageLength: 5,
                searching: false,
 

 
                ajax: {
                    url: "{{ route('category.view') }}",
                    data: function (d) {
                        d.category = $('#category').val(),
                        d.search = $('#search').val()
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                     {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action',     name: 'action', orderable: false, searchable: false}

                ]
            }) 
            
            $('#category').change(function(){

                table.draw();
            });
         
            $('#search').keyup(function(){
              table.draw();
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
        url: "form/DeleteView/"+id,
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
