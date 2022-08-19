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
                        <input type="text" class="form-control" name="name" id="name" value="{{ $slider->name }}" placeholder="Nhap tieu de">
                    </div>

                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="url">Duong dan</label>
                        <input type="text" class="form-control" name="url" id="url" value="{{ $slider->url }}" placeholder="Nhap duong dan">
                    </div>

                </div>
                <!-- /.col -->
            </div>

            <div class="form-group">
                <label for="sort_by">Sap xep</label>
                <input type="number" class="form-control" name="sort_by" min="1" value="{{ $slider->sort_by }}" id="sort_by">
            </div>


            <div class="form-group">
                <label for="content">Anh san pham</label>
                <input type="file" id="upload" class="form-control">
                <div id="image_show">
                    <a href="{{ $slider->thumb }}">
                        <img src="{{ $slider->thumb }}">
                    </a>
                </div>
                <input type="hidden" name="thumb" value="{{ $slider->thumb }}" id="thumb">
            </div>

            <div class="form-group">
                <label>Kich hoat</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" name="active" {{ $slider->active === 1 ? 'checked': '' }}>
                    <label class="form-check-label">Kich hoat</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" name="active" {{ $slider->active === 0 ? 'checked': '' }}>
                    <label class="form-check-label">Khong Kich hoat</label>
                </div>
            </div>

        </div>



        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cap nhat slider</button>
        </div>
    </form>
@endsection


