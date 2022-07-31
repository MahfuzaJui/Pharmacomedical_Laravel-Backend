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
            <th>Pharmacist ID</th>
        
        
        </tr>
        @foreach($pharmaceutical_items as $item)
        <tr>
            <td>{{$item->itemName}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->pharmaceuticalItemID}}</td>
            <td>{{$item->userID}}</td>
            
            
            
        
            
        
        </tr>
        @endforeach
    </table>
<br>
<br>
        <div class="d-flex justify-content-center">
            {!! $pharmaceutical_items->links() !!}
        </div>
    </form>
@endsection