<?php
/**
 * Created by PhpStorm.
 * User: a88wa
 * Date: 2016/7/19
 * Time: 13:11
 */

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function getList()
    {
        $user = new User();
        $result = $user->getList();
        return response()->json($result);
    }
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $user = new User();
        $userInfo = $user->exist($username);
        if($userInfo){
            if(md5($password) === $userInfo['password']){
                if (Session::has('user'))
                {
                    Session::forget('user');
                }
                Session::push('user',$userInfo);
                return response()->json(array('status'=>'1','msg'=>'ok','data'=>$userInfo));
            }else{
                return response()->json(array('status'=>'-1','msg'=>'password is error'));
            }
        }else{
            $result = $user->register($username,$password);
        };
        if($result){
            Session::push('user',$result);
            return response()->json(array('status'=>'1','msg'=>'ok','data'=>$result));
        }
        return response()->json(array('status'=>'0','msg'=>'system is error'));
    }

}