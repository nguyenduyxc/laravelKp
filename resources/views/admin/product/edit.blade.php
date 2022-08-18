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
                        <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}" placeholder="Nhap ten san pham">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label for="price">Gia goc</label>
                        <input type="number" class="form-control" name="price" min="0" value="{{ $product->price }}" id="price">
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6" data-select2-id="30">
                    <div class="form-group">
                        <label for="menu_id">Danh muc</label>
                        <select  class="form-control" name="menu_id" id="menu_id">
                            @foreach($menus as $menu)
                                <option value="{{$menu->id}}" {{ $menu->id === $product->menu_id ? 'selected' : ''  }}>{{$menu->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label for="price_sale">Gia giam</label>
                        <input type="number" class="form-control" min="0" name="price_sale" value="{{ $product->price_sale }}" id="price_sale">
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="form-group">
                <label for="description">Mo ta</label>
                <textarea type="text" class="form-control" name="description" id="description" placeholder="Mo ta">{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="content">Mo ta chi tiet</label>
                <textarea type="text" class="form-control" name="content" id="content" placeholder="Mo ta chi tiet">{{ $product->content }}</textarea>
            </div>


            <div class="form-group">
                <label for="content">Anh san pham</label>
                <input type="file" id="upload" class="form-control">
                <div id="image_show">
                    <a href="{{ $product->thumn }}" target="_blank"><img src="{{ $product->thumn }}" alt="" width="100px"></a>
                </div>
                <input type="hidden" name="thumn" value="{{ $product->thumn }}" id="thumb">
            </div>

            <div class="form-group">
                <label>Kich hoat</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" name="active"  {{ $product->active === 1 ? 'checked' : '' }}>
                    <label class="form-check-label">Kich hoat</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" name="active"  {{ $product->active === 0 ? 'checked' : '' }} >
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
