@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col" style="width: 40px">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Active</th>
            <th scope="col">Ngay update</th>
            <th scope="col" style="width: 100px">Action</th>
        </tr>
        </thead>
        <tbody>

{{--        {!!  !!}: dung cho bien dich ra html--}}
        {!! \App\Helpers\Helper::menu($menus) !!}

{{--        <tr>--}}
{{--            <th >1</th>--}}
{{--            <td>Mark</td>--}}
{{--            <td>Otto</td>--}}
{{--            <td>@mdo</td>--}}
{{--        </tr>--}}

        </tbody>
    </table>
@endsection

