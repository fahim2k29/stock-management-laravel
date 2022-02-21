@extends('admin.app')

@section('content')
    <div class="container-fluid">
        <h2 class="mt-4">product list</h2>
        <div>
            <a href="{{ route('product.create') }}" role="button" class="btn btn-primary btn-sm">Add Product</a>
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                {{ Session::forget('message') }}
            @endif
            <div class="d-flex justify-content-center align-items-center">

                <table class="table table-bordered text-center" style="width: 80%">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 5%">SN</th>
                            <th scope="col" style="width: 20%">Name</th>
                            <th scope="col" style="width: 20%">Type</th>
                            <th scope="col" style="width: 13%">Price</th>
                            <th scope="col" style="width: 12%">Quantity</th>
                            <th scope="col" style="width: 15%">Image</th>
                            <th scope="col" style="width: 15%"> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($products))
                            @foreach ($products as $key => $pd)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $pd->name }}</td>
                                    <td>{{ $pd->category->name }}</td>
                                    <td>৳ {{ $pd->price }}</td>
                                    <td>{{ $pd->quantity }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/products/' . $pd->image) }}" alt="{{ $pd->image }}"
                                            height="40px" width="80px" style="border-radius: 50%;">
                                    </td>
                                    <td>
                                        <a href="{{ route('product.edit', $pd->id) }}" class="btn btn-success"
                                            style="font-size: 12px;padding:5px; margin:5px">Edit</a>
                                        <form action="{{ route('product.destroy', $pd->id) }}" method="post"
                                            style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="alert('Are you Sure?')"
                                                style="font-size: 12px;padding:5px; margin:5px">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                            <tr>
                                <td colspan="10">There are no data.</td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">
                        {!! $products->links() !!}
                    </div>
        </div>
    </div>

@endsection
