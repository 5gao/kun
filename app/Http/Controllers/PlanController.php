<?php

namespace App\Http\Controllers;

use App\Model\Plan;

class PlanController extends Controller
{

	public function add()
	{
		$data = array();
		$data['qno'] = 'q2';
		$data['title'] = '我爱我家';
		$data['describe'] = '我爱我家';
		$data['status'] = 1;
		$data['public'] = 2;
		$plan = new Plan();
		$result = $plan->add($data);
		if($result){
			return response()->json(array('status'=>1,'msg'=>'ok'));
		}
		return response()->isNotFound();
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
