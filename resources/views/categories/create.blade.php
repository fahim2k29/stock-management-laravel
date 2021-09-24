@extends('admin.app')

@section('content')
    <h1>Category</h1>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 60vh;">
        <form action="{{ route('category.store') }}" method="POST" class="p-5 rounded shadow" style="width: 40rem;">
            @csrf
            <h3 class="text-center pb-2 display-6">Category Create</h3>
            <div class="mb-3">
                <label for="name">Name <sup class="red">*</sup></label>
                <input type="text" id="name" placeholder="Category Name"
                    class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                    required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name">Description <sup class="red">*</sup></label>
                <textarea type="text" id="description" placeholder="Category description"
                    class="form-control @error('description') is-invalid @enderror" name="description"
                    value="{{ old('description') }}" required>{{ old('description') }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="text-center mb-3">
                <button type="submit" class="btn btn-success"> Add
                </button>
            </div>
        </form>
    </div>


@endsection
