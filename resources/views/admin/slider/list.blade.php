@extends('admin.main')
@section('content')
    @include('admin/alert')
    <table class="table">
        <thead>
        <tr>
            <th scope="col" style="width: 40px">ID</th>
            <th scope="col">Tieu de</th>
            <th scope="col">Duong dan</th>
            <th scope="col">Anh slider</th>
            <th scope="col">Trang thai</th>
            <th scope="col">Ngay update</th>
            <th scope="col" style="width: 100px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sliders as $key => $slider)
            <tr>
                <td>{{$slider->id}}</td>
                <td>{{$slider->name}}</td>
                <td>{{$slider->url}}</td>
                <td>
                    <a href="{{$slider->thumb}}">
                        <img src="{{$slider->thumb}}" height="40px">
                    </a>
                </td>
                <td>{!! \App\Helpers\Helper::active($slider->active) !!}</td>
                <td>{{$slider->updated_at}}</td>
                <td>
                    <a href="/admin/sliders/edit/{{$slider->id}}" class="btn btn-primary btn-sm">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>

                    <a href="#"  class="btn btn-danger btn-sm"
                       onclick="removeRow({{$slider->id}}, '/admin/sliders/destroy')">
                        <i class="fa-solid fa-trash"></i>
                    </a>


                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <div class="card-footer clearfix">
        {!! $sliders->links() !!}
    </div>
@endsection

