@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('thongbaodangnhap'))
    <div class="alert alert-danger">
        {{Session::get('thongbaodangnhap')}}
    </div>
@endif

@if (Session::has('addCategorySuccess'))
    <div class="alert alert-success mt-3">
        {{Session::get('addCategorySuccess')}}
    </div>
@endif
