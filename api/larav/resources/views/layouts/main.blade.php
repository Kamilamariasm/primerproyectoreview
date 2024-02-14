<!DOCTYPE html>
<html>
  <head>
    @vite(['public/css/estilos.css','public/css/boostrap.css','public/css/responsive.css','public/css/styles.css'])
    <title>@yield('title')</title>
    
</head>
<body>
  @yield('content')
</body>
</html>