<?php
/**
 * Created by PhpStorm.
 * User: shikun
 * Date: 2016/8/5
 * Time: 21:30
 */

namespace App\Http\Controllers;


use App\Model\Likes;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class LikesController extends Controller
{
    public function getList()
    {
        $plan = new Likes();

    }
    public function addCollect(Request $request)
    {
        $pid = $request->input('id');
        $ptitle  = $request->input('title');
        $user = Session::get('user');
        $like = new Likes($user[0]['id'],$user[0]['username']);
        if($like->isCollect($pid)){
           return  response()->json(array('status'=>0,'msg'=>'the plan had collected'));
        }
        $result = $like->addCollect($pid,$ptitle);
        if($result){
            return response()->json(array('status'=>1,'msg'=>'ok'));
        }
        return response()->json(array('status'=>0,'msg'=>'error'));
    }
    public function addLikes(Request $request)
    {
        $pid = $request->input('id');
        $ptitle  = $request->input('title');
        $user = Session::get('user');
        $like = new Likes($user[0]['id'],$user[0]['username']);
        if($like->isLikes($pid)){
            return  response()->json(array('status'=>0,'msg'=>'the plan had likes'));
        }
        $result = $like->addLikes($pid,$ptitle);
        if($result){
            return response()->json(array('status'=>1,'msg'=>'ok'));
        }
        return response()->json(array('status'=>0,'msg'=>'error'));
    }
}