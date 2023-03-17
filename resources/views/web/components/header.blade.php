<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
 <meta name="csrf-token" content="{{ csrf_token() }}" />
 </head>
    <div class="header-area">
        <div class="container" >
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
                            <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                            <li><a href="cart.html"><i class="fa fa-user"></i> My Cart</a></li>
                            <li><a href="checkout.html"><i class="fa fa-user"></i> Checkout</a></li>
                            <li><a href="#"><i class="fa fa-user"></i> Login</a></li>
                            <li><a href="{{route('register')}}"><i class="fa fa-user"></i> sign up</a></li>

                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">INR</a></li>
                                    <li><a href="#">GBP</a></li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">
                                {{ Config::get('languages')[App::getLocale()] }}
                                  </a>
                             <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                             @foreach (Config::get('languages') as $lang => $language)
                                    @if ($lang != App::getLocale())
                               <a class="dropdown-item"  href="{{ URL('lang/'.$lang) }}"> {{$language}}</a>
                                   @endif
                              @endforeach
                                </div>
                         </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> 


    