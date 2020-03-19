<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Reply;
use App\Message;

class ReplyController extends Controller
{
    public function addkeyup(Request $request)
    {
        Reply::create($request->all());
        return redirect('keyset');
    }
    public function keyset(){
        $data=Reply::all();
        return view('setkey',['data'=>$data,'now'=>'key']);
    }
    public function tambahkey(){
        return view('addkey',['now'=>'key']);
    }
    public function hapuskey($id)
    {
    	$data=Reply::find($id);
    	$data->delete();
    	return redirect('keyset');
    }
    public function editkey($id)
    {
        $data=Reply::find($id);
        return view('editkey',['data'=>$data,'now'=>'key']);
    }
    public function upedit($id, Request $request)
    {
        $data=Reply::find($id);
        $data->update($request->all());
        return redirect('keyset');
    }
    public function reply($id)
    {
        $data=Message::find($id);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();
        return view('reply',['data'=>$data,'now'=>'dashboard']);
    }
    public function replySend(Request $request)
    {
        $data=Message::find($request->id);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        /* -----------------------------------------------------
        Simple PHP script for Sending Telegram Bot Message
        ~ Iky | https://www.wadagizig.com
        ------------------------------------------------------ */
        function sendMessage($telegram_id, $message_text, $secret_token) {
            $api = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
            $url = $api . "&text=" . urlencode($message_text);
            $ch = curl_init();
            $optArray = array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true
            );
            curl_setopt_array($ch, $optArray);
            $result = curl_exec($ch);
            curl_close($ch);
        }
        /*----------------------
        only basic POST method :
        -----------------------*/
        $telegram_id = $request->keycode;
        $message_text = $request->msg;
        /*--------------------------------
        Isi TOKEN dibawah ini: 
        --------------------------------*/
        $secret_token = "974882871:AAHV0SoiLOfOXtm2hHCvWHIk_M-m69SKkiY";
        sendMessage($telegram_id, $message_text, $secret_token);
        echo "<script>alert('Pesan berhasil terkirim!');</script>";
        DB::table('sent_box')
        ->insert([
            'name'=>$data->firstname,
            'chat_id'=>$data->chat_id,
            'username'=>$data->username,
            'message'=>$request->msg,
            'datetime'=>date('Y-m-d H:i:s'),
        ]);
        return view('reply',['data'=>$data,'now'=>'dashboard']);
    }
}
