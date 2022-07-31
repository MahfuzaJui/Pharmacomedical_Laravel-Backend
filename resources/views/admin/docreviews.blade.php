@extends('layouts.appAdmin')
@section('contentAdmin')
    <table class = "table table-border">
        
        <tr>
            <th>Patient ID</th>
            <th>Doctor ID</th>
            <th>Description</th>
            <th>Rating</th>
        
        
        </tr>
        @foreach($doctor_reviews as $review)
        <tr>
            <td>{{$review->userID}}</td>
            <td>{{$review->doctorID}}</td>
            <td>{{$review->description}}</td>
            <td>{{$review->point}}</td>
            <td><a href="/deletereview/{{$review->doctorReviewID}}">Delete</a></td>
        
        </tr>
        @endforeach
@endsection