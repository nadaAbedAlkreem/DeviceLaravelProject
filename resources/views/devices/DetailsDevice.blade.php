@extends('layouts.app')
@section('content')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap');
 
</style>
 

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
            <li class="breadcrumb-item"><a href="{{route('devices.view')}}">device</a></li>

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
              <h3>details</h3>
          
 
            </div>             
            
            </div>
            @foreach($data as $item)

         <div class="card-body">
              
              <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
            
              <!-- /.card-header -->
              <a href="/imageAdd?id={{$item->id}}"  class="btn btn-sm btn-info float-left"  >
                add image
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                 <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                 <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                 </svg>
               </a>
              
                      
            
        
    
              <!-- form start  -->
              <form  method="post" action="{{route('devices.actionAdd')}}"enctype="multipart/form-data" >
              @csrf 
                   @if(session()->has('status'))
                       @if(session('status'))
                          <div class = "alert alert-success">
                            successfully  add
                           </div> 
                           @else

                          <div class = "alert alert-danger">
                            faild add
                           </div>                        
                            @endif
                   @endif

                   @foreach ($errors->all() as $error) 

                        <div class = "alert alert-danger">
                       {{ $error }}            
                                     </div>    

                      @endforeach 
                      
                <div class="card-body">
                  <div class ="form-group">
                  <table class="table table-bordered  data-table   table-sm">
            <thead>
               <tr>
            
                     <th>id</th>
                     <th>image_url</th>
                     <th>is_main</th>
                     <th>created_at</th>
                     <th>updated_at</th>
                     <th>action</th>


      
                      </tr>
               </thead>
                <tbody>
                  <tr>
               
                  </tr>
                </tbody>
            
         </table>
              
            
                </div>
               </div>
                  <div class="form-group">
                  <input type="text" name="id" class="form-control" id="id"  value="{{$item->id}}"   hidden>


                    <label for="name" class="col-sm-2 col-form-label">name</label>
                    <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name"  value="{{$item->name}}"  readonly="readonly">
                    </div>
                  </div>
                  <div class="form-group">
                  <label for="code" class="col-sm-2 col-form-label">code</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control"    name="code" id="code" value= "{{$item->code}}"  readonly="readonly" >
                        </div>
                  </div>
                  
                  <div class="form-group">
                  <label for="price" class="col-sm-2 col-form-label">price</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control"   name="price" id="price"  value="{{$item->price}}" readonly="readonly">
                        </div>
                  </div>
                  <div class="form-group">
                  <label for="discount" class="col-sm-2 col-form-label">discount</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control"   name="discount" id="discount" value ="{{$item->discount}}" readonly="readonly" >
                        </div>
                  </div>
                  <div class="form-group">
                  <label for="Quantity" class="col-sm-2 col-form-label">Quantity</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control"   name="Quantity" id="Quantity" value = "{{$item->Quantity}}" readonly="readonly" >
                        </div>

 
                  </div>
                  <div class="form-group">
                  <!-- <label for="description" class="col-sm-2 col-form-label">description</label>
                        <div class="col-sm-10">
                          <textarea  type="editor" class="form-control" class="span6" rows="3"     name="description" id="description" readonly="readonly" > {!! htmlspecialchars($item->description) !!} </textarea>
                        </div> -->
                        <div class="form-group" for="description" >
                <textarea id="editor"   name="description" id="description"   disabled>{{$item->description}}</textarea>
                </div>
                  </div>
               
                </div>
                <!-- /.card-body -->
                 
              </form>
            </div>
            @endforeach
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
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
        pageLength: 3, 

        ajax: {
           url:"/{id}/details" ,
           data:{id :  $('#id').val()}
       
        },
        columns: [
                    {data: 'id', name: 'id'},
                    {data: 'image', name: 'image'},
                    {data: 'is_main', name: 'is_main'},

                     {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action',     name: 'action', orderable: false, searchable: false}

        ]
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
        url: "/DeleteItemImagedevices/"+id,
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
 ///
    
$(".data-table").on('click', '.mainStarUpdate[data-id]', function (e) { 
      e.preventDefault();
      
      $('.show_confirm').click(function(event) {

    swal({
        title: `Are you sure you want to delete this record?`,
        text: "If you delete this, it will be gone forever.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((result) => {
      var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
                if(result) {
   
    $.ajax(
    {
        url: "/ActionEditImageMain/"+id,
        type: 'post',
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
<script>
 
 

</script>


@endsection
