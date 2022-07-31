@extends('layouts.appAdmin')
@section('contentAdmin')
<form action= "{{route('searchProduct')}}" class "form-group" method = "GET">
    {{csrf_field()}}
    <table class = "table table-border">
        
        <div class="form-group p-1" >
            <label for="searched_products" ></label>
            <input type="search" name="searched_products">
            <div class="form-group p-1">
                <span>
                    <input type="submit" name="Search" value = "Search" class="btn btn-info">
                </span>
            </div>
        </div>
    <table class = "table table-border">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Item ID</th>
         
        
        
        </tr>
        @foreach($pharmaceutical_items as $searched_products)
        <tr>
            <td>{{$searched_products->itemName}}</td>
            <td>{{$searched_products->price}}</td>
            <td>{{$searched_products->pharmaceuticalItemID}}</td>
            
            
            
            
        
            
        
        </tr>
        @endforeach
@endsection