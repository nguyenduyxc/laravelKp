@extends('admin.main')
@section('content')
    @if(Session::has('thongbaodangnhap'))
        <div class="alert alert-success mt-3">
            {{ Session::get('thongbaodangnhap') }}
        </div>
    @endif
    Noi dung home
@endsection
