<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class request extends Model
{
    public static function getall(){
        return DB::table('request')
        ->join('car','request.car_id','car.car_id')
        ->join('status','request.status_id','status.status_id')
        ->join('users','request.user_id','users.id')
        ->where('status.status_id',2)
        ->get();
    }


    public static function getcar(){
        //dd($data);
        return DB::table('car')
        ->get();
    }
    public static function  getSta(){
        return DB:: table('status')->get();
    }


    public static function addr($data){
        //dd($data);
        return DB::table('request')
        ->insert($data);
    }
  
    public static function select($id){
        return DB::table('request')
        ->join('status','request.status_id','status.status_id')
        ->where('request_id',$id)
        ->first();
    }

    public static function updaterequest($id,$data){
        // dd($data);
        return DB::table('request')
        ->where('request_id',$id)
        ->update($data);
    }


    public static function delete_req($id){
        return DB::table('request')
        ->where('request_id',$id)
        ->delete();
    }

    public static function show_a(){
        return DB::table('request')
        ->join('car','request.car_id','car.car_id')
        ->join('status','request.status_id','status.status_id')
        ->join('users','request.user_id','users.id')
        ->where('status.status_id',1)
        ->get();
    }

}
