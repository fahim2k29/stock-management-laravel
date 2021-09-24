@extends('admin.app')

@section('content')
<div class="container-fluid">
<h1>Dashboard</h1>
    <div class="flex-container text-center">
        <div class="card" style="background-color: #74f08d">
            <h3 class="text-center">Total Members</h3><br><br>
            
            <h2>{{ $admins->count() }}</h2>
        </div>
        <div class="card" style="background-color: #b3ca6d ">
            <h3 class="text-center">Total Items</h3><br><br>
            <h2>{{ $categories->count() }}</h2>
        </div>
        <div class="card" style="background-color: #f77777">
            <h3 class="text-center">Total Products</h3><br><br>
            <h2>{{ $products->count() }}</h2>
        </div>
      
       
    </div>
    <div class="flex-container text-center">
        <div class="card" style="background-color: #b7dc92">
            <h3 class="text-center">Total Stock</h3><br><br>
            <h2>{{ $productQuantity }}</h2>
        </div>
        <div class="card" style="background-color: #f59a79">
            <h3 class="text-center">Total Orders</h3><br><br>
            <h2></h2>

        </div>
        <div class="card" style="background-color: #7e7ee8">
            <h3 class="text-center">Total Warehouse</h3><br><br>
            <h2></h2>

        </div>
       
    </div>
</div>
@endsection