<?php
/**
 * 处理文件上传下载
 *  1 上传到服务器
 *  2 获取URL
 *
 * bin.li@yulore.com
 * */
namespace Org\Util;

class File{
    private $secret = null;   // 密码
    private $pull   = null;   // 获取的URL
    private $push   = null;   // 推送的URL
    /**
     * 初始化配置
     * */
    function __construct(){
        $config = C();
        if(isset($config['FILE_SERVER']) && !empty($config['FILE_SERVER'])){
            $arr=$config['FILE_SERVER'];
            if(isset($arr['SECRET']) && !empty($arr['SECRET'])){
                $this->secret = $arr['SECRET'];
            }
            if(isset($arr['PUSH_URL']) && !empty($arr['PUSH_URL'])){
                $this->push = $arr['PUSH_URL'];
            }
            if(isset($arr['PULL_URL']) && !empty($arr['PULL_URL'])){
                $this->pull = $arr['PULL_URL'];
            }
        }
        if(empty($this->secret) || empty($this->pull) || empty($this->push)){
            exit(json_encode(array('code'=>1,'msg'=>'文件服务器未配置')));
        }
    }
    /**
     * 获取
     *  1 根据文件ID获取文件URL信息
     *
     * 返回
     *  1 json
     * */
    function pull($file_id){
        $config = parse_ini_file(__DIR__.'/../config/config.ini',true);
        $url  = $this->pull."?f={$file_id}&r=json&s=0";
        $info = file_get_contents($url);
        return $info;
    }
    /**
     * 上传
     *  1 根据文件路径 和 文件ID 上传到文件服务器
     *
     * 返回
     *  true 或 错误信息
     * */
    public function push($file_path,$file_id){
        if(preg_match('/\w*\.\w*$/',$file_path,$match)){
            $save_key = $match[0];
        }else{
            return false;
        }
        $url    = $this->push;
        $secret = $this->secret;

        $options = array();
        $options['thumbnails'] = '0x0|100x100|200x200';
        $options['expiration'] = time()+60;
        $options['save-key'] = 'hao/'.$save_key;
        $options['replace-file-id'] = $file_id;

        $policy = base64_encode(json_encode($options));
        $sig    = md5($policy.'&'.$secret);
        $file   = "@".$file_path;
        $fields = array(
            'policy'=>$policy,
            'signature'=>$sig,
            'file'=>$file,
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url );
        curl_setopt($ch, CURLOPT_POST, 1 );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $rs = curl_exec( $ch );

        if ($error = curl_error($ch) ) {
            curl_close($ch);
            return false;
        }
        curl_close($ch);
        if('200: ok'==$rs){
            return true;
        }else{
            return $rs;
        }
    }
}
?>
