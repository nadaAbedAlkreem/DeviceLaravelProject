 
 
 <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse navbar" >
                    <ul class="nav navbar-nav">
                        <li class="nav-item dropdown active"><a href="{{route('index')}}"  >Home</a>
                        </li>
          <?php          $rows=      category()   ;  ?>
                        @if(!empty($rows))
                        @foreach($rows as $item)
                        @if($item->level == 0)
                        <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key dropbtn">{{ $item->name }}</a>
                                @endif
                          
                                 <ul class="dropdown-menu " >
                                 @foreach($rows as $itemLevel)
                                  @if($item->id == $itemLevel->level)
                                    <li ><a href="{{route('AllProductByCategory' ,  ['id' =>$itemLevel->id  ])}}"> {{$itemLevel->name}}</a></li>
                                    @endif

                                 @endforeach
                                </ul>
                             </li>
                              
                        @endforeach
                         @endif
                 
       
                    </ul>
                </div>  
            </div>
        </div>
    </div>