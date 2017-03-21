<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\QueueModel;
class IndexController extends Controller {

    public function index()
    {
        $m = new QueueModel();
        if (isset($_GET['p']) and is_numeric($_GET['p'])) 
        {
            $res = $m->getQueue($_GET);
        }
        else
        {
            $res = $m->getQueue([]);
        }
        $dict = C('QUEUE_STATUS');
        foreach ($res['list'] as $key => $value) 
        {
            $res['list'][$key]['status'] = $dict[$value['status']];
        }
        $this->assign('list',$res['list']);
        $this->assign('total',$res['total']);
        // $page = new \Org\Util\Page($res['total'],10);
        $page = new \Think\Page($res['total'],10);
        if($res['total'] > 10)
        {
            $this->assign('show',$page->show());
        }
        $this->display();
    }
    public function uploadFile()
    {
        $this->display();
    }
    public function upload()
    {

        $qm = new QueueModel();
        $data = [];
        $upload = new \Think\Upload();// 实例化上传类
        $upload->autoSub = false;
        // $upload->subName = array('date','Ymd');
        $upload->maxSize   =     1024*1024*30 ;// 设置附件上传大小
        $upload->exts      =     array('txt');// 设置附件上传类型
        $upload->rootPath  =     '/Data/batch/list/'; // 设置附件上传根目录
        $upload->savePath  =     ''; // 设置附件上传（子）目录
        $upload->saveName  = $this->setFileName(basename($_FILES['photo']['name'],'.txt')); 
        // 上传文件 
        $info   =   $upload->upload();
        if(!$info)
        {// 上传错误提示错误信息
            $this->error($upload->getError());
        }
        else
        {// 上传成功
            $data['name'] = $upload->saveName;
            // $data['num'] = $this->getFileLine($upload->rootPath.$data['name']);
            $data['created_time'] = time();
            $data['created_ip'] = get_client_ip();
            $data['status'] = -1;
            $qm->saveQueue($data);
            $this->success('上传成功！');
        }
    }
    private function setFileName($filename)
    {
        return strval(time().'-'.$filename);
    }
    
    public function getFileLine($file)
    {
        $fp = fopen($file, 'r');
        $i = 0;
        while (!feof($fp)) 
        {
            if ($data = fread($fp, 1024*1024*2)) 
            {
                $num = substr_count($data, "\n");
                $i += $num;
            }
        }
        fclose($fp);
        return $i;
    }
}