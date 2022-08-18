@extends('admin.main')


@section('content')
    @include('admin/alert')
    <form action="" method="POST">
        @csrf
        <div class="card-body" data-select2-id="31">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Tieu de</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Nhap tieu de">
                    </div>

                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="url">Duong dan</label>
                        <input type="text" class="form-control" name="url" id="url" value="{{ old('url') }}" placeholder="Nhap duong dan">
                    </div>

                </div>
                <!-- /.col -->
            </div>

            <div class="form-group">
                <label for="sort_by">Sap xep</label>
                <input type="number" class="form-control" name="sort_by" min="1" value="1" id="sort_by">
            </div>


            <div class="form-group">
                <label for="content">Anh san pham</label>
                <input type="file" id="upload" class="form-control">
                <div id="image_show">

                </div>
                <input type="hidden" name="thumb" id="thumb">
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



        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Them slider</button>
        </div>
    </form>
@endsection


