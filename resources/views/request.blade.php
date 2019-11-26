@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ตารางการใช้รถ</div>

                <div class="table">
                    <table class="table table-bordered">
                      <thead class="thead-dark" >
                        <tr >
                          <th scope="col"></th>
                          <th scope="col">ประเภทรถ</th>
                          <th scope="col">วัตถุประสงค์</th>
                          <th scope="col">จำนวนผู้โดยสาร</th>
                          <th scope="col">ต้นทาง</th>
                          <th scope="col">ปลายทาง</th>
                          <th scope="col">ตั้งแต่วันที่</th>
                          <th scope="col">ถึงวันที่</th>
                          <th scope="col">ชื่อผู้จอง</th>
                          <th scope="col">สถานะ</th>  
                                              
                          

                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 0; ?>
                        @foreach($request as $key)
                        <?php $i++?>

                        

                        <tr>
                        
                          <th scope="row">{{$i}}</th>
                          <td>{{$key->car_name}}</td>
                          <td>{{$key->request_name}}</td>
                          <td>{{$key->count_people}}</td>
                          <td>{{$key->from_place}}</td>
                          <td>{{$key->to_place}}</td>
                          <td>{{$key->date_rent}}</td>
                          <td>{{$key->date_return}}</td>
                          <td>{{$key->first_name}} {{$key->last_name}}</td>
                          <td>{{$key->request_status}}</td>
                        
                        @endforeach
                       
                     </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">ตารางการจองรถ</div>

                <div class="card-body">
                    <table class="table table-bordered">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">ประเภทรถ</th>
                          <th scope="col">วัตถุประสงค์</th>
                          <th scope="col">จำนวนผู้โดยสาร</th>
                          <th scope="col">ต้นทาง</th>
                          <th scope="col">ปลายทาง</th>
                          <th scope="col">ตั้งแต่วันที่</th>
                          <th scope="col">ถึงวันที่</th>
                          <th scope="col">ชื่อผู้จอง</th>
                          <th scope="col">สถานะ</th>
                          <th></th>
                          <th></th>
                          

                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 0; ?>
                        @foreach($req as $key)
                        <?php $i++?>

                        

                        <tr >
                          <th scope="row">{{$i}}</th>
                          <td>{{$key->car_name}}</td>
                          <td>{{$key->request_name}}</td>
                          <td>{{$key->count_people}}</td>
                          <td>{{$key->from_place}}</td>
                          <td>{{$key->to_place}}</td>
                          <td>{{$key->date_rent}}</td>
                          <td>{{$key->date_return}}</td>
                          <td>{{$key->first_name}} {{$key->last_name}}</td>
                          <td>{{$key->request_status}}</td>
                          
                          @if(Auth::user()->level == 'แอดมิน')<td>
                          <a href ="request_edit{{$key->request_id}}">แก้ไข</a> </td>
                          <td><a href ="request_delete{{$key->request_id}}">ลบ</a></td>
                          @endif
                         
                          
                          @if(Auth::user()->level == 'บุคลากร')
                            @if(Auth::user()->id == $key->user_id)
                              <td><a href ="request_edit{{$key->request_id}}">แก้ไข</a></td>                         
                            @endif
                            @if(Auth::user()->id == $key->user_id)
                              <td><a href ="request_delete{{$key->request_id}}">ลบ</a></td>
                            @endif
                          @endif
                        
                        </tr>
                        @endforeach

      
                     </tbody>
                    </table>

                    <center><a href ="add_request"> <button class ="btn btn-primary">เพิ่มจองรถ</button></a></center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
