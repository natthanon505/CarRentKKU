@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">เอกสารขอยืมรถ</div>

                <div class="card-body">
                    <form method="POST" action="addrequest" >
                    
                        @csrf

                        <div class="form-group row">
                            <label for="car_id" class="col-sm-4 col-form-label text-md-right">เลือกรถ</label>

                            <div class="col-md-6">
                            <select class="form-control" name = "car_id">
                            @foreach($car as $key)
                                <option value="{{$key->car_id}}">{{$key->car_name}} | {{$key->car_license}}</option>
                            @endforeach
                                
                            </select>                      
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="request_name" class="col-md-4 col-form-label text-md-right">วัตถุประสงค์</label>

                            <div class="col-md-6">
                                <input id="request_name" type="text" class="form-control{{ $errors->has('request_name') ? ' is-invalid' : '' }}" name="request_name" value="{{ old('request_name') }}" required autofocus>                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="count_people" class="col-md-4 col-form-label text-md-right">จำนวนคน</label>

                            <div class="col-md-6">
                                <input id="count_people" type="text" class="form-control{{ $errors->has('count_people') ? ' is-invalid' : '' }}" name="count_people" value="{{ old('count_people') }}" required autofocus>                                 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="from_place" class="col-sm-4 col-form-label text-md-right">ต้นทาง</label>

                            <div class="col-md-6">
                                <input id="from_place" type="text" class="form-control{{ $errors->has('from_place') ? ' is-invalid' : '' }}" name="from_place" value="{{ old('from_place') }}" required autofocus>                       
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="to_place" class="col-md-4 col-form-label text-md-right">ปลายทาง</label>

                            <div class="col-md-6">
                                <input id="to_place" type="text" class="form-control{{ $errors->has('to_place') ? ' is-invalid' : '' }}" name="to_place" value="{{ old('to_place') }}" required autofocus>                               
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="date_rent" class="col-sm-4 col-form-label text-md-right">เวลาเดินทาง</label>

                            <div class="col-md-6">
                                <input id="date_rent" type="datetime-local" min="2019-11-26T00:00" class="form-control{{ $errors->has('date_rent') ? ' is-invalid' : '' }}" name="date_rent" value="{{ old('date_rent') }}" required autofocus>                       
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_return" class="col-md-4 col-form-label text-md-right">เวลากลับ</label>

                            <div class="col-md-6">
                                <input id="date_return" type="datetime-local"min="2019-11-26T00:00" class="form-control{{ $errors->has('date_return') ? ' is-invalid' : '' }}" name="date_return" value="{{ old('date_return') }}" required autofocus>                               
                            </div>
                        </div>

                        
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                  บันทึก
                                </button>

                            
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
