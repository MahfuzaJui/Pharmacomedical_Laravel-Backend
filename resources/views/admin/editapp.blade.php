<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <div class="container" style="width:500px;">  
        <h2>Edit Appointment</h2> 
            <form action="{{ route('editapp') }}" method="POST">  
                {{csrf_field()}}
                <input type="hidden" name="appID" value="{{ $appointments['appID']; }}">
                <div class="form-group">
                    <label for="name">PatientID</label>
                    <input type="text" class="form-control" id="PatientID" name="PatientID" placeholder="Enter PatientID">
                    @error('PatientID')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="DoctorID">DoctorID</label>
                    <input type="DoctorID" class="form-control" id="DoctorID" name="DoctorID" placeholder="Enter DoctorID">
                    @error('DoctorID')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="AppointmentTime">AppointmentTime</label>
                    <input type="datetime-local" class="form-control" id="AppointmentTime" name="AppointmentTime" placeholder="AppointmentTime">
                    @error('AppointmentTime')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="PaymentDateTime">PaymentDateTime</label>
                    <input type="datetime-local" class="form-control" id="PaymentDateTime" name="PaymentDateTime" placeholder="PaymentDateTime">
                    @error('PaymentDateTime')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Purpose">Purpose</label>
                    <input type="text" class="form-control" id="Purpose" name="Purpose" placeholder="Purpose">
                    @error('Purpose')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Visited">Visited</label>
                    <input type="text" class="form-control" id="Visited" name="Visited" placeholder="Visited">
                    @error('Visited')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="PaymentStatus">PaymentStatus</label>
                    <input type="PaymentStatus" class="form-control" id="PaymentStatus" name="PaymentStatus" placeholder="PaymentStatus">
                    @error('PaymentStatus')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="AppointmntStatus">AppointmentStatus</label>
                    <input type="AppointmntStatus" class="form-control" id="AppointmntStatus" name="AppointmntStatus" placeholder="AppointmntStatus">
                    @error('AppointmntStatus')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Link">Link</label>
                    <input type="Link" class="form-control" id="Link" name="Link" placeholder="Link">
                    @error('Link')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group p-1">
                    <span>
                        <input type="submit" name="Update" value="Update" class="btn btn-info">
                    </span>
                </div>
                </div>
            </form> 
        </div>
    </body>
</html>              