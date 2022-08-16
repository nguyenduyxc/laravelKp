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
                <input type="text" name="name" class="form-control" value="{{$menu->name}}" id="name" placeholder="Nhap danh muc">
            </div>

            <div class="form-group">
                <label for="parent_id">Danh muc cha</label>
                <select class="form-control" name="parent_id">
                    <option value="0" {{ $menu->parent_id == 0 ? 'selected' : '' }}>Danh muc cha</option>
                    @foreach($menusParent0 as $menuParent0)
                        <option value="{{ $menuParent0->id }}" {{$menuParent0->id == $menu->parent_id  ? 'selected' : ''}}>{{ $menuParent0->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">Mo ta</label>
                <textarea type="text" class="form-control" name="description" id="description" placeholder="Mo ta">{{$menu->description}}</textarea>
            </div>

            <div class="form-group">
                <label for="content">Mo ta chi tiet</label>
                <textarea type="text" class="form-control" name="content"  id="content" placeholder="Mo ta chi tiet">{{$menu->content}}</textarea>
            </div>


            <div class="form-group">
                <label>Kich hoat</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" name="active" {{ ($menu->active=="1")? "checked" : "" }}>
                    <label class="form-check-label">Kich hoat</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" name="active" {{ ($menu->active=="0")? "checked" : "" }}>
                    <label class="form-check-label">Khong Kich hoat</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cap nhat danh muc</button>
        </div>
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
