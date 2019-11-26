<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as req;
use Auth;

class RequestController extends Controller
{
    public function getrequest(){
        
        $req =req::getall();
        $req1 = req::show_a();
        //dd($req);
        $data =array('req'=>$req,'request'=>$req1);
        
        return view('request',$data);
    }

    public function addreq(Request $req){
        $car = $req->input('car_id');
        $reqname = $req->input('request_name');
        $people = $req->input('count_people');
        $fromplace = $req->input('from_place');
        $toplace = $req->input('to_place');
        $daterent = $req->input('date_rent');
        $datereturn = $req->input('date_return');       
        $status=$req->input('status_id');    
        $data = array('car_id'=>$car
        ,'count_people'=>$people
        ,'request_name'=>$reqname
        ,'from_place'=>$fromplace
        ,'to_place'=>$toplace
        ,'date_rent'=>$daterent
        ,'date_return'=>$datereturn
        ,'status_id'=>2        
        ,'user_id'=> Auth::user()->id
       );
        //dd($data);
        
        
        $insert = req::addr($data);
        //dd('ok');
        return redirect('request');
     
    }

    public function editrequest($id){
        //dd($id);
        $req= req::select($id);
        $car = req::getCar();
        $sta = req::getSta();
        

        $data = array('request'=>$req,'car'=>$car,'sta'=>$sta);
        return view('request_edit',$data);
    }

    public function edit(Request $req){
        
        $id = $req->input('id');
        //dd($id);
        $car = $req->input('car_id');
        $reqname = $req->input('request_name');
        $people = $req->input('count_people');
        $fromplace = $req->input('from_place');
        $toplace = $req->input('to_place');
        $daterent = $req->input('date_rent');
        $datereturn = $req->input('date_return');
        $status = $req->input('status_id');
        $data = array('car_id'=>$car
        ,'count_people'=>$people
        ,'request_name'=>$reqname
        ,'from_place'=>$fromplace
        ,'to_place'=>$toplace
        ,'date_rent'=>$daterent
        ,'date_return'=>$datereturn
        ,'status_id'=>2
        ,'status_id'=>$status
       );
        $update = req::updaterequest($id,$data);

        return redirect("request");
    }


    public function getform(){
        
        $car = req::getCar();
        //dd($car);
        $data = array('car'=>$car);
        return view('AddRequest',$data);
    }


    public function delete_req($id){
        //dd($id);
        $req = req::delete_req($id);
        return redirect("request");
        
    }

    public function show_req(){
        $req = req::show_a();
        $data =array('request'=>$req);
        return view("showrequest",$data);
    }
}
