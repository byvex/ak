<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="description" content="" />
    <title>{{ env('APP_NAME') }}</title>
    <!-- Style Link Start -->
      @include('admin.components.partials.head_link')
    <!-- Style Link End -->  
  </head>
  <body>
    <!-- Content -->
    <div class="container-xxl" style="background: url('{{ asset('assets/img/f2.jpg') }}') no-repeat center center; background-size: cover;">
      {{ $slot }}
    </div>
    <!-- / Content -->
    <!-- Script Link Start -->
      @include('admin.components.partials.body_scripts')
    <!-- Script Link End -->  
  </body>
</html>

