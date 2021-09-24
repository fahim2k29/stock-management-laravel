@extends('admin.app')

@section('content')
    <div class="container-fluid" style="margin: 100px 0">
        <div class="d-flex justify-content-center align-items-center" style="min-height: 50vh;">
            <form action="{{ route('product.store') }}" method="POST" class="p-3 rounded shadow" style="width: 35rem;"
                enctype="multipart/form-data">
                <button class="btn btn-sm btn-primary" onclick="history.go(-1)">Back</button>
                @csrf
                <h1 class="text-center pb-2 display-6">Product Create</h1>
                <div class="mb-3">
                    <label for="name">Name <sup class="red">*</sup></label>
                    <input type="text" id="name" placeholder="Product Name" class="form-control  @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category_id">Category<sup class="red">*</sup></label>
                    <select class="chosen-select form-control @error('category_id') is-invalid @enderror" id="category_id"
                        name="category_id" required>
                        <option value="">- Category -</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price">Price ৳<sup class="red">*</sup></label>
                    <input type="number" id="price" step="0.01" placeholder="Product price"
                        class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}"
                        required>
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantity">Quantity <sup class="red">*</sup></label>
                    <input type="number" id="quantity" placeholder="Product quantity"
                        class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                        value="{{ old('quantity') }}" required>
                    @error('quantity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name">Description <sup class="red">*</sup></label>
                    <textarea type="text" id="description" placeholder="Product description"
                        class="form-control @error('description') is-invalid @enderror" name="description"
                        value="{{ old('description') }}" required>{{ old('description') }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image">Image <sup class="red">*</sup></label>
                    <input name="image" type="file" id="image" class="form-control @error('image') is-invalid @enderror"
                        onchange="readURL(this);" value="{{ old('image') }}">

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <small class="red">Maximum Size 2MB</small>
                </div>
                <div class="mb-2">
                    <button type="submit" class="btn btn-success float-end"> Add
                    </button>
                    <button type="submit" class="btn btn-primary" onclick="history.go(-1);"> Back
                    </button>
                </div>
            </form>
        </div>

    </div>

@endsection
