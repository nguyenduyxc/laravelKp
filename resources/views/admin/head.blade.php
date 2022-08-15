<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $title  }}</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="{{ URL::asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('template/admin/plugins/fontawesome-free/css/all.min.css') }}">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="{{ URL::asset('template/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ URL::asset('template/admin/dist/css/adminlte.min.css') }}">

<meta name="csrf-token" content="{{ csrf_token() }}">
@yield('head')
