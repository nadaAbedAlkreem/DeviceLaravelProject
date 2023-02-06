@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('user.view')}}">view</a></li>

              <li class="breadcrumb-item active">Edit category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
            
              <!-- /.card-header -->
              <!-- form start -->
              @foreach($row as $value)

           <form  method="post" action="{{route('user.ActionEdit', ['id' => $value->id])}}">
              @csrf 

              @if(session()->has('status'))
                       @if(session('status'))
                          <div class = "alert alert-success">
                            successfully  update
                           </div> 
                           @else

                          <div class = "alert alert-danger">
                            faild update
                           </div>                        
                            @endif
                   @endif

                   @foreach ($errors->all() as $error) 

                        <div class = "alert alert-danger">
                       {{ $error }}            
                                     </div>    

                   @endforeach 
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="name" value="{{$value->name}}">
                  </div>
                  <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="name" value="{{$value->name}}">
                  </div> 
                
                 
 
                  
                 <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
 
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


@endsection
