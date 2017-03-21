<?php
namespace Home\Model;
use Think\Model;
class QueueModel extends Model{
    protected  $error     = null;
    private    $amount    = 10;
    public function __construct () {
        parent::__construct();
    }
    //返回错误
    public function getError(){
        return $this->error;
    }
    public function getQueue($data)
    {
        $field = 'id,name,num,download,created_time,created_ip,status,remark';
        $res = [];
        if (empty($data)) 
        {
            $res['list'] = M('queue')->field($field)->order('id')->limit($this->amount)->select();
            $res['total'] = M('queue')->field($field)->order('id')->count();
            return $res;
        }
        else
        {
            $where = [];
            if (isset($data['status']) and !empty($data['status'])) 
            {
                $wher['status'] = $data['status'];
            }
            if (isset($data['name']) and !empty($data['name'])) 
            {
                $wher['name'] = $data['name'];
            }
            if (isset($data['p']) and !empty($data['p'])) 
            {
                $res['list'] = M('queue')->field($field)->where($where)->order('id')->limit(($data['p']-1)*$this->amount,$this->amount)->select();
                $res['total'] = M('queue')->field($field)->where($where)->order('id')->count();
            }
            else
            {
                $res['list'] = M('queue')->field($field)->where($where)->order('id')->limit($this->amount)->select();
                $res['total'] = M('queue')->field($field)->where($where)->order('id')->count();
            }
            return $res;
        }
    }

    public function saveQueue($data)
    {
        M('queue')->add($data);
    }
}
