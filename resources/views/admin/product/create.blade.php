@extends('admin.main')

@section('head')

    <script src="{{ URL::asset('ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    @include('admin/alert')
    <form action="" method="POST">
        @csrf
        <div class="card-body" data-select2-id="31">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Ten san pham</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nhap ten san pham">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label for="price">Gia goc</label>
                        <input type="number" class="form-control" name="price" value="0" id="price">
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6" data-select2-id="30">
                    <div class="form-group">
                        <label for="menu_id">Danh muc</label>
                        <select id="cars" name="cars" class="form-control" name="menu_id" id="menu_id">
                            @foreach($menus as $menu)
                                <option value="{{$menu->id}}">{{$menu->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label for="price_sale">Gia giam</label>
                        <input type="number" class="form-control" name="price_sale" value="0" id="price_sale">
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="form-group">
                <label for="description">Mo ta</label>
                <textarea type="text" class="form-control" name="description" id="description" placeholder="Mo ta"></textarea>
            </div>

            <div class="form-group">
                <label for="content">Mo ta chi tiet</label>
                <textarea type="text" class="form-control" name="content" id="content" placeholder="Mo ta chi tiet"></textarea>
            </div>


            <div class="form-group">
                <label for="content">Anh san pham</label>
                <input type="file" id="upload" class="form-control">
                <div id="image_show">

                </div>
                <input type="hidden" name="file" id="file">
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
            <button type="submit" class="btn btn-primary">Them san pham</button>
        </div>
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
