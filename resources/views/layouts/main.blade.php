<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Pranay Aryal | A Laravel Application</title>
        <link rel="stylesheet" href="{{ asset('css/foundation.css')}}" />
        <link rel="stylesheet" href="{{ asset('css/app.css')}}" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
        <script src="{{asset('js/vendor/modernizr.js') }}"></script>
    </head>

    <body>

    <!-- Header and Nav -->
     
        @include('partials.nav')
     
        <!-- End Header and Nav -->

        <!-- Adding a success message -->
        @if(Session::has('flash_message'))
            <div class="alert-box default">
                {!! Session::get('flash_message') !!}
            </div>
        @endif

        @if (Session::has('success'))
            <div class="alert alert-success">
                {!! Session::get('success') !!}
            </div>
       @endif


       <div class="row">
            <div class="large-12">
                @yield('content')
            </div>
        </div>
 
 
    
 
    
        
            
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
        <script src="{{asset('js/vendor/jquery.js')}}"></script>
        <script src="{{asset('js/foundation.min.js')}}"></script>

        <script src="{{asset('js/app.js')}}"></script>
        <script>
          $(document).foundation();
        </script>
        <div class = "row">
            @yield('footer')
        </div>
    </body>
</html>