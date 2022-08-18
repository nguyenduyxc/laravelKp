@extends('admin.main')
@section('content')
    @include('admin/alert')
    <table class="table">
        <thead>
        <tr>
            <th scope="col" style="width: 40px">ID</th>
            <th scope="col">Ten san pham</th>
            <th scope="col">Danh muc</th>
            <th scope="col">Gia goc</th>
            <th scope="col">Gia khuyen mai</th>
            <th scope="col">Active</th>
            <th scope="col">Ngay update</th>
            <th scope="col" style="width: 100px">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $key => $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->menu->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->price_sale}}</td>
                <td>{!! \App\Helpers\Helper::active($product->active) !!}</td>
                <td>{{$product->updated_at}}</td>
                <td>
                    <a href="/admin/products/edit/{{$product->id}}" class="btn btn-primary btn-sm">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>

                    <a href="#"  class="btn btn-danger btn-sm"
                       onclick="removeRow({{$product->id}}, '/admin/products/destroy')">
                        <i class="fa-solid fa-trash"></i>
                    </a>


                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    {!! $products->links() !!}
@endsection

