<?php
/**
 * Created by PhpStorm.
 * User: shikun
 * Date: 2016/8/9
 * Time: 20:50
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use League\Flysystem\Exception;
use Illuminate\Support\Facades\DB;

class Likes extends Model
{
    /**
     * @var
     */
    private $uid;
    /**
     * @var
     */
    private $user_name;


    public function __construct($uid,$user_name)
    {
        $this->uid = $uid;
        $this->user_name = $user_name;
        parent::__construct($attributes = array());
    }

    public function addLikes($pid,$ptitle)
    {
        try{
            DB::beginTransaction();
            $plan = new Plan($this->uid,$this->user_name);
            $plan->updateLikes($pid);
            $this->_insertLikes($pid,$ptitle);
            DB::commit();
            return true;
        }catch (Exception $e){
            DB::rollback();
            return false;
        }
    }

    protected function _insertLikes($pid,$ptitle)
    {
        $bind = array(
            'uid'=>$this->uid,
            'username'=>$this->user_name,
            'pid'=>$pid,
            'ptitle'=>$ptitle,
            'created' => date('Y-m-d H:i:s',time()),
            'updated'=> date('Y-m-d H:i:s',time())
        );
        $result =  DB::table('likes')->insertGetId($bind);
        return $result;
    }


    public function addCollect($pid,$ptitle)
    {
        try{
            DB::beginTransaction();
            $plan = new Plan($this->uid,$this->user_name);
            $plan->updateCollect($pid);
            $this->_insertCollect($pid,$ptitle);
            DB::commit();
            return true;
        }catch (Exception $e){
            DB::rollback();
            return false;
        }

    }

    protected function _insertCollect($pid,$ptitle)
    {
        $bind = array(
            'uid'=>$this->uid,
            'username'=>$this->user_name,
            'pid'=>$pid,
            'ptitle'=>$ptitle,
            'created' => date('Y-m-d H:i:s',time()),
            'updated'=> date('Y-m-d H:i:s',time())
        );
        $result =  DB::table('collection')->insertGetId($bind);
        return $result;
    }

    public function isCollect($id)
    {
        return DB::table('collection')->where('pid',$id)->where('uid',$this->uid)->get();
    }
    public function isLikes($id)
    {
        return DB::table('likes')->where('pid',$id)->where('uid',$this->uid)->get();
    }
}