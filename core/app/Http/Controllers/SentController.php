<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\SentBox;

class SentController extends Controller
{
    public function sentbox()
    {
    	$data=DB::table('sent_box')
    	->orderBy('datetime','desc')
    	->get();
    	return view('sent',['data'=>$data,'now'=>'sent']);
    }
    public function srcsent(Request $Request)
    {
    	$data=DB::table('sent_box')
    	->where('chat_id','like','%'.$Request->key.'%')
    	->orWhere('username','like','%'.$Request->key.'%')
    	->orWhere('name','like','%'.$Request->key.'%')
    	->orWhere('message','like','%'.$Request->key.'%')
    	->orWhere('datetime','like','%'.$Request->key.'%')
    	->get();
    	return view('sent',['data'=>$data,'now'=>'sent']);
    }
    public function delsent($id)
    {
    	$data=SentBox::find($id);
    	$data->delete();
    	return redirect('sentbox');
    }
    public function hapussent($id)
    {
    	$data=SentBox::find($id);
    	$data->delete();
    	return response()->json(['status'=>'success','id'=>$id]);
    }
}