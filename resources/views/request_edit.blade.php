@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">แก้ไขข้อมูล</div>

                <div class="card-body">
                    <form method="POST" action="edit" >
                    <input type="hidden" name ="id" value = "{{$request->request_id}}">
                        @csrf

                        <div class="form-group row">
                            <label for="car_id" class="col-sm-4 col-form-label text-md-right">เลือกรถ</label>

                            <div class="col-md-6">
                            <select class="form-control" name = "car_id">
                            @foreach($car as $key)
                                @if($key->car_id == $request->car_id)
                                <option value="{{$key->car_id}}" selected>{{$key->car_name}} | {{$key->car_license}}</option>
                                @else
                                <option value="{{$key->car_id}}">{{$key->car_name}} | {{$key->car_license}}</option>
                                @endif
                            @endforeach
                                
                            </select>                      
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="request_name" class="col-md-4 col-form-label text-md-right">วัตถุประสงค์</label>

                            <div class="col-md-6">
        
                                <input id="request_name" type="text" class="form-control{{ $errors->has('request_name') ? ' is-invalid' : '' }}" name="request_name" value="{{ $request->request_name }}" required autofocus>                               
                            
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="count_people" class="col-md-4 col-form-label text-md-right">จำนวนคน</label>

                            <div class="col-md-6">
                                <input id="count_people" type="text" class="form-control{{ $errors->has('count_people') ? ' is-invalid' : '' }}" name="count_people" value="{{ $request->count_people }}" required autofocus>                                 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="from_place" class="col-sm-4 col-form-label text-md-right">ต้นทาง</label>

                            <div class="col-md-6">
                                <input id="from_place" type="text" class="form-control{{ $errors->has('from_place') ? ' is-invalid' : '' }}" name="from_place" value="{{ $request->from_place }}" required autofocus>                       
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="to_place" class="col-md-4 col-form-label text-md-right">ปลายทาง</label>

                            <div class="col-md-6">
                                <input id="to_place" type="text" class="form-control{{ $errors->has('to_place') ? ' is-invalid' : '' }}" name="to_place" value="{{ $request->to_place }}" required autofocus>                               
                            </div>
                        </div>

                        <?php

                        $date_from = substr("$request->date_rent",0,10);
                        $time_from = substr("$request->date_rent",11,5);
                        $date_rent = $date_from."T".$time_from;

                        $date_from = substr("$request->date_return",0,10);
                        $time_from = substr("$request->date_return",11,5);
                        $date_return = $date_from."T".$time_from;
                        
                        ?>
                        
                      
                        
                        <div class="form-group row">
                            <label for="date_rent" class="col-sm-4 col-form-label text-md-right">เวลาเดินทาง</label>

                            <div class="col-md-6">
                                <input id="date_rent" type="datetime-local" min="2019-11-26T00:00" class="form-control{{ $errors->has('date_rent') ? ' is-invalid' : '' }}" name="date_rent" value="{{$date_rent}}" required autofocus>                       
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_return" class="col-md-4 col-form-label text-md-right">เวลากลับ</label>

                            <div class="col-md-6">
                                <input id="date_return" type="datetime-local"  min="2019-11-26T00:00" class="form-control{{ $errors->has('date_return') ? ' is-invalid' : '' }}" name="date_return" value="{{$date_return}}" required autofocus>                               
                            </div>
                        </div>
                        
                        

                        @if(Auth::user()->level == 'แอดมิน')
                        <div class="form-group row">
                            <label for="car_id" class="col-sm-4 col-form-label text-md-right">สถานะ</label>
                            <div class="col-md-6">
                            <select class="form-control" name = "status_id">
                            @foreach($sta as $key)
                                @if($key->status_id == $request->status_id)
                                <option value="{{$key->status_id}}" selected>{{$key->request_status}}</option>
                                @else
                                <option value="{{$key->status_id}}">{{$key->request_status}}</option>
                                @endif
                            @endforeach
                                
                            </select>                      
                            </div>
                        </div>
                        @endif

                        @if(Auth::user()->level == 'บุคลากร')
                        <div class="form-group row">
                            <label for="status_id" class="col-sm-4 col-form-label text-md-right">สถานะ</label>
                            <div class="col-md-6">
                            <select class="form-control" name = "status_id"  >
                            @foreach($sta as $key)
                                @if($key->status_id == $request->status_id)
                                <option value="{{$key->status_id}}" >{{$key->request_status}}</option>                              
                                @endif
                            @endforeach
                                
                            </select>                      
                            </div>
                        </div>
                        @endif
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                  แก้ไขข้อมูล
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