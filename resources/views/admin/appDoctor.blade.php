@extends('layouts.appAdmin')
@section('contentAdmin')

 <form action="{{ route('appDoctor') }}" method="GET">
    <table class = "table table-border">
        <thead>
        <tr>
            <th>Doctor</th>
            <th>Appointment ID</th>
            <th>Purpose </th>
        </tr>
        </thead>
        <tbody>
            
             @foreach($doctor as $doctor)
            {
                 
                @foreach($app as $apps)
                {
                    <tr>
                    <td>{{$doctor->doctorID}} </td>
                    <td> {{$apps->appID}} </td>
                    <td> {{$apps->purpose}} </td>
                </tr>
                
                }
                @endforeach
            
            }
            @endforeach 
            
            
           
        
        </tbody>
    </table>
        
        
@endsection