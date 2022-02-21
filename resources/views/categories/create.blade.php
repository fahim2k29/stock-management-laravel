@extends('admin.app')

@section('content')
    <h1>Category</h1>

    <div id="app">

    </div>

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

<script src="https://unpkg.com/vue@next"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.2.19/vue.cjs.min.js" integrity="sha512-2ftG6Hks6q07Ca+h8f4WCFWQAZca6bm1klWMAFGev51hiusd6FFaRT+kFWcj1G2KjFgZrns1CuwR8eA4OA0zLw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script >
    const app = new Vue({
        template:'<h1>Hello Vue With CDN</h1>'
    });
    app.mount("#app");
</script>
