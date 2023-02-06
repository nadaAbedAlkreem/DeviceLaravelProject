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
              <li class="breadcrumb-item"><a href="{{route('category.view')}}">view</a></li>

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

           <form  method="post" action="{{route('category.ActionEdit', ['id' => $value->id])}}">
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
                  <label for="image" class="col-sm-2 col-form-label">image</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control"   name="image">
                        </div>
                  </div>
                  <div>
                  <label for="level">level</label>
                  <select class="form-select" aria-label="Default select example" name = "level">
                        <option value="-1" > </option>
                       <option value="0" >Basic category</option>
                        @if(!empty($categoryViewForm))
                          @foreach($categoryViewForm as $item)
                          <option value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach                         
                        @endif
                  </select>

                  </div>
                  @endforeach
                 
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
