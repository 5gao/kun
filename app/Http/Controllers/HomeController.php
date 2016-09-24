<?php
/**
 * Created by PhpStorm.
 * User: shikun
 * Date: 2016/8/5
 * Time: 21:30
 */

namespace App\Http\Controllers;


use App\Model\Plan;

class HomeController extends Controller
{
    public function getList()
    {
        $plan = new Plan();
        $result = $plan->getHomeList();
        if($result){
            return response()->json(array('status'=>1,'msg'=>'ok','data'=>$result));
        }else{
            return response()->json(array('status'=>11,'msg'=>'add the plan fail'));
        }
    }
}