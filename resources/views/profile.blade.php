@extends('layouts.app')

@section('content')

 <div class="wrapper">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-8" style="margin: auto;">

          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">personal profile</a></li>
                   <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                  
                     
            
                

                <form class="form-horizontal" method = "post" action="{{ route('update', ['id' => Auth::user()->id]) }}"
                enctype="multipart/form-data" >
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

                              <p class="text-danger">{{ $error }}</p>
  
                            @endforeach 

                            <div class="card card-primary-center"  >
                            <div class="card-body box-profile">
                               <div class="text-center">
                               <img class="profile-user-img img-fluid img-circle"
                                    src='{{asset("my_custom_symlink_1/".Auth::user()->image)}}'
                                alt="User profile picture">
                      


                               
                              </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="imageUser" class="col-sm-2 col-form-label">image</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control"   name="imageUser">
                        </div>
                      </div>
                       <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">change password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="password"  >
                           
                      
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Confirm</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="password_confirm" >
                        </div>
                      </div>
                      <button type="submit"class="btn btn-primary btn-block"><b>update</b></button>
                    </form>
               </div>
              <!-- /.card-body -->
            </div>

                    
              
                  </div>
                  
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action= "{{route('insertSetting')}}" method="post"  
                    enctype="multipart/form-data"
                    >
                    @csrf 
                    @if(session()->has('statusS'))
                       @if(session('statusS'))
                          <div class = "alert alert-success">
                            successfully update
                           </div> 
                           @else

                          <div class = "alert alert-danger">
                            faild update
                           </div>                        
                            @endif
                   @endif

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name website</label>
                        <div class="col-sm-10">
                          <input type="name" class="form-control" id="inputName" placeholder="Name" name ="website_name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="logo" class="col-sm-2 col-form-label">logo</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" id="logo"  name="website_logo">
                        </div>
                      </div>
                     
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">update setting</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


           </div>
             
                  
                      </div>
                      <!-- END timeline item -->
                  
                    </div>
                  </div>
                  <!-- /.tab-pane -->

              
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

 
@endsection
