<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Message;
use App\Reply;

class MessageController extends Controller
{
    public function getup(Request $request){
        $primary=DB::table('replys')
        ->get();
        $found=DB::table('replys')
        ->where('keycode','=',$request->msg)
        ->first();
        if (isset($found)) {
            $rp=$found->msg;
        }else{
            $rp=$primary[0]->msg;
        }        
    	return response()->json(['msg'=>$rp]);
    }
    public function tambah(Request $request){
    	$date=date("Y-m-d H:i:s", $request->date);
    	Message::create([
    		'username'=>$request->username,
    		'firstname'=>$request->first_name,
    		'text'=>$request->message,
    		'chat_id'=>$request->chat_id,
            'date'=>$date,
    	]);
    	return response()->json(['reply'=>true]);
    }
    public function hapuspesan($id)
    {   
        $data=Message::find($id);
        $data->delete();
        return response()->json(['status'=>'success','id'=>$id]);
    }
    public function srcmsg(Request $request)
    {
        $data=DB::table('message')
        ->where('username','like','%'.$request->key.'%')
        ->orWhere('firstname','like','%'.$request->key.'%')
        ->orWhere('chat_id','like','%'.$request->key.'%')
        ->orWhere('text','like','%'.$request->key.'%')
        ->get();
        return view('home',['data'=>$data,'now'=>'dashboard']);
    }
    public function delpsn($id)
    {
        $data=Message::find($id);
        $data->delete();
    }
}

