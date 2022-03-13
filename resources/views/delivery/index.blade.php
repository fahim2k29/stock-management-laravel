@extends('admin.app')

@section('content')
    <div class="container-fluid">
        <h2 class="mt-4">Delivery list</h2>
        <div>
            <a href="{{ route('delivery.create') }}" role="button" class="btn btn-primary btn-sm">Create Delivery</a>
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

                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
{{--                {!! $products->links() !!}--}}
            </div>
        </div>
    </div>

@endsection
