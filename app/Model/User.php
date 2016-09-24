<?php
/**
 * Created by PhpStorm.
 * User: shikun
 * Date: 2016/7/29
 * Time: 23:27
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    const TB_PLAN = 'plan';
    /**
     * @var string
     */
    protected $table = 'user';

    /**
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = ['username','phone','umber','password','status','created','updated','email',
    'head_img','sex','ip','country','industry','school'];

    protected $uid = 0;

    public function __construct($uid=0)
    {
        $this->uid = $uid;
        parent::__construct($attributes = array());
    }

    /**
     * @var string
     */
    protected $error = '';

    /**
     * @param $keyword
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getList($keyword)
    {
        if($keyword){
            $list = DB::table(self::TB_PLAN)->where('title','like','%'.$keyword.'%')->where('uid',$this->uid)->get();
            $count = DB::table(self::TB_PLAN)->where('title','like',$keyword)->where('uid',$this->uid)->count('id');
        }else{
            $list = DB::table(self::TB_PLAN)->where('uid',$this->uid)->get();
            $count = DB::table(self::TB_PLAN)->where('uid',$this->uid)->count('id');
        }
        return array('list'=>$list,'count'=>$count);
    }

    /**
     * @param string $username
     * @return bool
     */
    public function exist($username)
    {
        try{
            $result = User::where('username','=',$username)->firstOrFail();
            return $result;
        }catch (Exception $e){
            $this->error = $e->getMessage();
            return false;
        }
    }

    public function register($username,$password)
    {
        $userInfo = array();
        $userInfo['username'] = $username;
        $userInfo['password'] = md5($password);
        $userInfo['number'] = time();
        $userInfo['status'] = 1;
        $userInfo['created'] = date('Y-m-d H:i:s',time());
        $userInfo['updated'] = date('Y-m-d H:i:s',time());
        $result =  DB::table($this->table)->insert($userInfo);
        if($result){
            return $userInfo;
        }
        return $result;
    }

    public function userList()
    {

    }
}