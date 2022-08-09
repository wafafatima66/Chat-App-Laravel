<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lead;

class ApiController extends Controller
{
    public function apiStoreLead(Request $request){
        $apiKey='a7e7bdab35764c758fca5dd2a46f8978';
        $userID='21243';
           
        $check_sum=$request->input('check_sum');

        $data=$request->all()['data'];
        $narray=array();
        foreach($data as $key => $r){
            if ($key=='name') $r =str_replace('_',' ',$r);
            if ($key=='email') $r =str_replace('_','.',$r);
            if ($key=='phone') $r =str_replace('_','+',$r);
            $narray[$key]=$r;
        }
        $checkSum = sha1($apiKey);

        if($check_sum!=$checkSum){
            $result['status']="error";
            $result['error']="Unauthorized. Check sum invalid";
            $result['data']='';
            return $result;
        }


        $Lead = new Lead();
        $product_id = 1;
        if($data['product_id']) $product_id = $data['product_id'];
        $Lead->product_id= $product_id;
        $Lead->name = $data['name'];
        $Lead->email = $data['email'];
        $Lead->phone = $data['phone'];
        $Lead->country = $data['country'];
        $Lead->web_id = $data['web_id'];
        $Lead->pSl = $data['sub_id'];
        $Lead->status = 1;

        $leadData = Lead::where('product_id',$data['product_id'])->first();
        if(isset($leadData)){
            $max_lead_sl_no = Lead::where('product_id',$data['product_id'])->max('sl_no');
            $Lead->sl_no = $max_lead_sl_no+1;
        }
        else{
            $Lead->sl_no = 1;
        }

        $Lead->save();

        $result['status']="ok";
            $result['error']="null";
            $result['data']=array('id'=>$Lead->id, 'status'=>'accept');
        return $result;


    }
}
