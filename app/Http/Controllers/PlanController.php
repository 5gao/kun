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
		$plan = new Plan($user[0]['id'],$user[0]['phone']);
		$result = $plan->add($data);
		if($result){
			return response()->json(array('status'=>1,'msg'=>'ok'));
		}else{
			return response()->json(array('status'=>11,'msg'=>'add the plan fail'));
		}
	}

	public function getList()
	{
		$plan = new Plan();
		$result = $plan->getList();
		if($result){
			return response()->json(array('status'=>1,'msg'=>'ok','data'=>$result));
		}
		return response()->isNotFound();
	}

	public function view()
	{

	}

	public function update()
	{

	}

	public function delete()
	{

	}

}
