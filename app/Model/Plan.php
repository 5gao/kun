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

    protected $fillable = ['qno','title','describe','status','public','created','updated'];
    public function __construct()
    {
        parent::__construct($arr = array());
    }

    /**
     *
     */
    public function getList()
    {
        $result = DB::table($this->table)->get();
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
        $result = Plan::find($id);
        return $result;
    }

    public function add($data)
    {
        $plan = array();
        $plan['qno'] = $data['qno'];
        $plan['title'] = $data['title'];
        $plan['describe'] = $data['describe'];
        $plan['status'] = 1;
        $plan['public'] = $data['public'];
        $plan['created'] = date('Y-m-d H:i:s',time());
        $plan['updated'] = date('Y-m-d H:i:s',time());
        $result =  Plan::create($plan);
        return $result;
    }


}