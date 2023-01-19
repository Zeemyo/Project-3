<!doctype html>
<html lang="en">
{{-- head --}}
    @include('artikel/template/head')

  <body id="page-top">
    {{-- navbar --}}
    @include('artikel/template/navbar')

    <div class="container">
        @include('artikel/template/about')
    </div>
    <div class="container">
        @include('artikel/template/artikel-carousell')
    </div>
    <div class="container">
        @include('artikel/template/services')
    </div>
    <div class="container">
        @include('artikel/template/konsultasi-page')
    </div>

    <!-- <div class="container">
        @yield('content')
    </div> -->

  
   {{-- javascript --}}
   @include('sb-admin/javascript')
  </body>
  
</html>