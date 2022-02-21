@extends('admin.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Category list</h1>
        <div>
            <a href="{{ route('category.create') }}" role="button" class="btn btn-primary btn-sm">Add Category</a>
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                {{ Session::forget('message') }}
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="d-flex justify-content-center align-items-center">

                <table class="table table-bordered text-center" style="width: 70%">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 10%">SN</th>
                            <th scope="col" style="width: 30%">Name</th>
                            <th scope="col" style="width: 40%">Description</th>
                            <th scope="col" style="width: 20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($categories))

                            @foreach ($categories as $key => $cat)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td style="font-weight: 500">{{ $cat->name }}</td>
                                    <td>{{ $cat->description }}</td>
                                    <td>
                                        <a href="{{ route('category.edit', $cat->id) }}" class="btn btn-success"
                                            style="font-size: 12px;padding:5px; margin:5px">Edit</a>
                                        <form action="{{ route('category.destroy', $cat->id) }}" method="POST"
                                            style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" id="id" class="btn btn-danger" 
                                                style="font-size: 12px;padding:5px; margin:5px">
                                                Delete
                                            </button>
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
        </div>
    </div>

@endsection
