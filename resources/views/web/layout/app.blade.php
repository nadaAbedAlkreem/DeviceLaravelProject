
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Ustora Demo</title>
    @include('web.asset.css')
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">


  </head>
  <body>

                       
                          @include('web.components.header')
                          @include('web.components.brandingArea')

                                      @include('web.components.navigation')


                                          <!-- Page Content -->
                                                  <main>
                                                  @yield('content')
                                                   </main>
                                                   @include('web.asset.js')

                                                   @include('web.components.footer')


                                                  
</body>
 </html>





 