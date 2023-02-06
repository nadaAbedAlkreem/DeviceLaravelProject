<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
  
            <!-- Page Heading -->
            <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
       
        <title>{{ config('app.name', 'Laravel') }}</title>

            @include('asset.css')

           </head>
           
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  
                <!-- Preloader -->
               
                       
                         @include('components.navigation')

                          <!-- /.navbar -->

                            <!-- Main Sidebar Container -->
                              @include('components.sideBar')

                               @if (isset($header))
                           <header class="bg-white shadow">
                                     {{ $header }}
                                 </header>
                                     @endif

                                          <!-- Page Content -->
                                                  <main>
                                                  @yield('content')
                                                   </main>
                                                  @include('asset.js')
                                                  @include('components.footer')

</body>
 
 </html>
