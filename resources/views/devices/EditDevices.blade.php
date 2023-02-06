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
              <li class="breadcrumb-item"><a href="{{route('devices.view')}}">view</a></li>

              <li class="breadcrumb-item active">Edit devices</li>
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

         <form  method="post" action="{{route('devices.ActionEdit', ['id' => $value->id])}}" enctype="multipart/form-data" >
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
                    <label for="name" class="col-sm-2 col-form-label">name</label>
                    <div class="col-sm-10">
                    <input type="text" name="name" value="{{$value->name}}" class="form-control" id="name"  placeholder="name">
                    </div>
                  </div>
                  <div class="form-group">
                  <label for="code" class="col-sm-2 col-form-label">code</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="{{$value->code}}"   name="code" id="code" placeholder="code">
                        </div>
                  </div>
                  <div class="form-group">
                  <label for="image" class="col-sm-2 col-form-label">image</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control"    name="image">
                        </div>
                  </div>
                  <div class="form-group">
                  <label for="price" class="col-sm-2 col-form-label">price</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control"  value ="{{$value->price}}"  name="price" id="price" placeholder="price">
                        </div>
                  </div>
                  <div class="form-group">
                  <label for="discount" class="col-sm-2 col-form-label">discount</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control"   value="{{$value->discount}}" name="discount" id="discount" placeholder="discount">
                        </div>
                  </div> 
                  <div class="form-group">
                  <label for="Quantity" class="col-sm-2 col-form-label">Quantity</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control"  value ="{{$value->Quantity}}"  name="Quantity" id="Quantity" placeholder="Quantity">
                        </div>
                  </div>
                  <div class="form-group">
                  <label for="description" class="col-sm-2 col-form-label">description</label>
                        <div class="col-sm-10">
                          <textarea  type="text" class="form-control"   class="span6" rows="3"   name="description" id="description" placeholder="description">{{$value->description}}</textarea>
                        </div>
                  </div>
                  <div>
                    
                  <label for="category_id" class="col-sm-2 col-form-label">level</label>
                  <div class="col-sm-10">

                  <select class="form-select"  id="category_id" name = "category_id" >
                  <option value="0"  > </option>

                         @if(!empty($data))
                          @foreach($data as $item)
                          <option value="{{$item->id}}"  >{{$item->name}}</option>
                          @endforeach                         
                        @endif
                  </select> 
                  </div>
                  </div>
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              @endforeach
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
   
 
          <!--/.col (right) -->
             </div>
        <!-- /.row -->
         <!--/.col (right) -->
         </div>
        <!-- /.row -->
      </div> 

    </section>
    <!-- /.content -->
  </div>


  @endsection