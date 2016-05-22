<!DOCTYPE html>
<html lang="en">
<head>
@include('partials._head')
@yield('stylesheets')
</head>
<body id="app-layout">
  
  @include('partials._nav')
  <div class="wrapper">   
  @include('partials._messages')
  @yield('content')
</div>
    <!-- JavaScripts -->
    @include('partials._footer')
    
       @yield('scripts')
</body>
</html>