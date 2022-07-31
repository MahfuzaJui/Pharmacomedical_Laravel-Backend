@extends('layouts.appAdmin')
@section('contentAdmin')
    <div class = "container">
    <br><br>
        <h2>Add Appointment</h2> 
            <form action="{{ route('addapp') }}" method="POST">  
                {{csrf_field()}}
            <div class="form-group">
                    <label for="PatientID">Patient ID</label>
                <select name="PatientID" id="PatientID">
                        <option value="" selected>Select Patient</option>
                    @foreach ($patients as $patient)
                        <option value="{{$patient->userID}}">{{$patient->userID}}</option>
                    @endforeach
                </select>
                @error('PatientID')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

        <div class="form-group">
            <label for="Doctor ID">Doctor ID</label>
            <select name="DoctorID" id="DoctorID">
                @foreach ($doctors as $doctor)
                    <option value="{{$doctor->doctorID}}">{{$doctor->doctorID}}</option>
                @endforeach
            </select>
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
                    <input type="Visited" class="form-control" id="Visited" name="Visited" placeholder="Visited">
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
                        <input type="submit" name="submit" value="Add" class="btn btn-info">
                    </span>
                </div>
                </div>
            </form> 
        </div>
        @endsection             