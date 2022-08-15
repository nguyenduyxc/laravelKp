@extends('admin.main')

@section('head')

    <script src="{{ URL::asset('ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    @include('admin/alert')
    <form action="" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Ten danh muc</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nhap danh muc">
            </div>

            <div class="form-group">
                <label for="parent_id">Danh muc cha</label>
                <select class="form-control" name="parent_id">
                    <option value="0">Danh muc cha</option>
                @foreach($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">Mo ta</label>
                <textarea type="text" class="form-control" name="description" id="description" placeholder="Mo ta"></textarea>
            </div>

            <div class="form-group">
                <label for="content">Mo ta chi tiet</label>
                <textarea type="text" class="form-control" name="content" id="content" placeholder="Mo ta chi tiet"></textarea>
            </div>


            <div class="form-group">
                <label>Kich hoat</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" name="active" checked="">
                    <label class="form-check-label">Kich hoat</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" name="active" >
                    <label class="form-check-label">Khong Kich hoat</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Them danh muc</button>
        </div>
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
