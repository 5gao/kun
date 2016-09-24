<?php
/**
 * Created by PhpStorm.
 * User: shikun
 * Date: 2016/7/29
 * Time: 23:28
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Plan extends Model
{
    /**
     * @var string
     */
    protected $table = 'plan';

    /**
     * @var bool
     */
    public $timestamps = false;

    protected $uid = 0;
    protected $username = '';

    protected $fillable = ['qno','title','describe','uid','username','status','public','created','updated',
    'plan_status','collect','views','likes'];
    public function __construct($uid = 0,$username = '')
    {
        $this->uid = $uid;
        $this->username = $username;
        parent::__construct($arr = array());
    }

    /**
     *
     */
    public function getList($page,$offset,$keyword)
    {
        if($keyword){
            $result = DB::table($this->table)->where('title','like','%'.$keyword.'%')->where('public',2)->get();
        }else{
            $result = DB::table($this->table)->where('public',2)->skip($page)->take($offset)->get();
        }
        $count = DB::table($this->table)->count();
        return array('list'=>$result,'count'=>$count);
    }

    public function getUserList()
    {

    }
    /**
     * @param $id
     * @return bool|array
     */
    public function view($id)
    {
        error_log('the id is '.$id);
        $result = DB::table($this->table)->where('id',$id)->get();
        return $result;
    }

    public function add($data)
    {
        $plan = array();
        $plan['qno'] = 'P'.time();
        $plan['title'] = $data['title'];
        $plan['describe'] = $data['describe'];
        $plan['uid'] = $this->uid;
        $plan['username'] = $this->username;
        $plan['status'] = 1;
        $plan['public'] = $data['public'];
        $plan['created'] = date('Y-m-d H:i:s',time());
        $plan['updated'] = date('Y-m-d H:i:s',time());
        $result =  DB::table($this->table)->insertGetId($plan);
        return $result;
    }


    public function getHomeList()
    {
        $result = DB::table($this->table)->limit(10)->get();
        return array('list'=>$result);
    }

    public function updatePublic($id,$public)
    {
        $bind = array('public'=>$public,'updated'=>date('Y-m-d H:i:s',time()));
        $result = DB::table($this->table)->where('id',$id)->where('uid',$this->uid)->update($bind);
        return $result;
    }

    public function updateStatus($id,$status)
    {
        $bind = array('plan_status'=>$status,'updated'=>date('Y-m-d H:i:s',time()));
        $result = DB::table($this->table)->where('id',$id)->where('uid',$this->uid)->update($bind);
        return $result;
    }

    public function updateLikes($id)
    {
        DB::update('update '.$this->table.' set likes = likes+1 where id = ?', [$id]);
    }
    public function updateCollect($id)
    {
        DB::update('update '.$this->table.' set collect = collect+1 where id = ?', [$id]);
    }
    public function deletePlan($id)
    {
        return DB::table($this->table)->where('id', $id)->where('uid',$this->uid)->delete();
    }
}