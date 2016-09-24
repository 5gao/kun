<?php

namespace App\Http\Controllers;

use App\Model\Plan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class PlanController extends Controller
{

	public function add(Request $request)
	{
		$data = array();
		$data['title'] = $request->input('title');
		$data['describe'] = $request->input('describe');
		$data['public'] = $request->input('public') ? 1 :2 ;
		$user = Session::get('user');
		$plan = new Plan($user[0]['id'],$user[0]['username']);
		$result = $plan->add($data);
		if($result){
			return response()->json(array('status'=>1,'msg'=>'ok'));
		}else{
			return response()->json(array('status'=>11,'msg'=>'add the plan fail'));
		}
	}

	public function getList(Request $request)
	{
		$keyword = $request->input('keyword');
		$page = $request->input('page');
		$offset = $request->input('offset');
		$plan = new Plan();
		$result = $plan->getList($page,$offset,$keyword);
		if($result){
			return response()->json(array('status'=>1,'msg'=>'ok','data'=>$result));
		}
		return response()->isNotFound();
	}

	public function view(Request $request)
	{

		$id = $request->input('id');
		$user = Session::get('user');
		$plan = new Plan($user[0]['id'],$user[0]['username']);
		$result = $plan->view($id);
		return response()->json(array('status'=>1,'msg'=>'ok','data'=>$result));

	}

	public function updatePublic(Request $request)
	{
		$id = $request->input('id');
		$public = $request->input('public');
		$user = Session::get('user');
		$plan = new Plan($user[0]['id'],$user[0]['username']);
		$result = $plan->updatePublic($id,$public);
		return response()->json(array('status'=>1,'msg'=>'ok','data'=>$result));
	}

	public function updateStatus(Request $request)
	{
		$id = $request->input('id');
		$status = $request->input('status');
		$user = Session::get('user');
		$plan = new Plan($user[0]['id'],$user[0]['username']);
		$result = $plan->updateStatus($id,$status);
		return response()->json(array('status'=>1,'msg'=>'ok','data'=>$result));
	}

	public function delete(Request $request)
	{
		$id = $request->input('id');
		$user = Session::get('user');
		$plan = new Plan($user[0]['id'],$user[0]['username']);
		$result = $plan->deletePlan($id);
		if($request){
			return response()->json(array('status'=>1,'msg'=>'ok','data'=>$result));
		}
		return response()->json(array('status'=>0,'msg'=>'error'));
	}

}
