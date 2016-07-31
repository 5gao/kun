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

class User extends Model
{
    /**
     * @var string
     */
    protected $table = 'user';

    /**
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = ['phone','umber','password','status','created','updated'];

    /**
     * @var string
     */
    protected $error = '';

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getList()
    {
        $result = User::all();
        return $result;
    }

    /**
     * @param int $phone
     * @return bool
     */
    public function exist($phone)
    {
        try{
            $result = User::where('phone','=',$phone)->firstOrFail();
            return $result;
        }catch (Exception $e){
            $this->error = $e->getMessage();
            return false;
        }
    }

    public function register($username,$password)
    {
        $userInfo = array();
        $userInfo['phone'] = $username;
        $userInfo['password'] = md5($password);
        $userInfo['number'] = time();
        $userInfo['status'] = 1;
        $userInfo['created'] = date('Y-m-d H:i:s',time());
        $userInfo['updated'] = date('Y-m-d H:i:s',time());
        $result =  User::create($userInfo);
        if($result){
            return $userInfo;
        }
        return $result;
    }
}