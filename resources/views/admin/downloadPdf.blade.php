
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    </head>
    <body>
        <form>
    
    
    <table class = "table table-border">
        <tr>
            <th>Application ID</th>
            <th>Doctor ID</th>
            <th>Doctor Name</th>
            <th>Patient ID</th>
            <th>Appointment Date & Time</th>
            <th>Purpose</th>
            
            <th>Link</th>
        </tr>
        @foreach($app as $app)
        <tr>
            <td>{{$app->appID}}</td>
            <td>{{$app->doctorID}}</td>
            <td>{{$app->name}}</td>
            <td>{{$app->userID}}</td>
            <td>{{$app->appointmentDateTime}}</td>
            <td>{{$app->purpose}}</td>
            
            
            <td><a href="{{$app->link}}">{{$app->link}}</a></td>

            
        
        </tr>
        @endforeach
    </table>

</form>
<div class="d-flex justify-content-center">
    <span>
        <a href="javascript:window.print()" class="btn btn-success"><i class="fa fa-print"></i> Print</a>
    </span>
</div>
</body>
</html>
