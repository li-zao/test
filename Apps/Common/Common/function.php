<?php
    //检测元素是否在目标数组中并返回
    function _checkMustParam($params, $type='get'){
        if($type == 'post'){
            $array = &$_POST;
        }else{
            $array = &$_GET;
        }
        $keys = explode(',', $params);
        foreach ($keys as $value){
            if(!isset($array[$value])){
                return array('success'=>0,'msg'=>$value,'data'=>'');
            }
        }
        return array('success'=>1);
    }

    //获取32位的hash字符串
    function getHashString(){
        return strtoupper(md5(uniqid(rand(), true)));
    }

    function authCurl($curl,$arrayInfo=array(),$isPost = true){
        $data['data'] = json_encode($arrayInfo,JSON_UNESCAPED_UNICODE);
        $data['time'] = time();
        $data['appid'] = C('auth_appid');
        $appkey = C('auth_appkey');
        $data['sig'] = md5($appkey.$data['appid'].$data['time']); //签名，md5(data+appkey+time)
        $result = curl($curl,$data, $isPost);
        if($result && $result['httpcode']==200 && $result['data']){
            return json_decode($result['data'], true);
        }else{
            return array();
        }
    }

    /**
     * curl
     * @param string $url
     * @param array $data
     * @param boolean $mode 是否为post请求，默认为get
     * @return boolean|mixed
     */
    function curl($url, $data=array(), $isPost=true, $time = 60, array $headers=[]){
        if($isPost){
            $options[CURLOPT_POST] = 1;
            $options[CURLOPT_POSTFIELDS] = $data;
        }else{
            if($data){
                $url .= '?' . http_build_query($data);
            }
        }
        if($headers){
            foreach( $headers as $key => $value ) {
                $headers_array[] = $key .':' . $value;
            }
            $options[CURLOPT_HTTPHEADER] = $headers_array;
        }
        $options[CURLOPT_RETURNTRANSFER] = true;
        $options[CURLOPT_TIMEOUT] = $time;
        $ch = curl_init($url);
        curl_setopt_array($ch, $options);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        $output = curl_exec($ch);
        if(curl_errno($ch)){
            return array();
        }else{
            return array('httpcode' => curl_getinfo($ch,CURLINFO_HTTP_CODE), 'data'=>$output);
        }
    }

    function _filter($array,$config){
        $elements = C($config);
        foreach ($array as $key=>$value){
            if(isset($elements[$key])){
                if($elements[$key]['require'] == false && empty($value)){
                    $arr = array('website','address');
                    if(!in_array($key,$arr,true)){
                        unset($array[$key]);
                    }
                }
            }

        }
        return $array;
    }

    function comList($uid){
        $url = C('apis.company_getUserCompanyList');
        $data['uid'] = $uid;
        $comList = authCurl($url,$data,'get');
        return $comList;
    }


    /**
     * /^[\x{4e00}-\x{9fa5}]+$/u
     *if(!preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u",$str)) //UTF-8汉字字母数字下划线正则表达式
     * if(!preg_match("/^[".chr(0xa1)."-".chr(0xff)."A-Za-z0-9_]+$/",$str)) //GB2312汉字字母数字下划线正则
     */
    //$isIDCard1="/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$/";
    //$isIDCard2="/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/";
    //$aCity='{11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古",21:"辽宁",22:"吉林",23:"黑龙江",31:"上海",32:"江苏",33:"浙江",34:" 安徽",35:"福建",36:"江西",37:"山东",41:"河南",42:"湖北",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆",51:"四川",52:"贵州" ,53:"云南",54:"西藏",61:"陕西",62:"甘肃",63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外"}';
    //var $rs=this.cidInfo(sId,aCity);


/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 + 以下为PC版新添加
 *++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
/**
 * 返回json并停止执行
 * @param string $status
 * @param string $msg
 * @param array $data
 */
function returnJson($status='0', $msg='', $data=array()){
    $result = array('status'=>$status, 'msg'=>$msg, 'data'=>$data);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    exit();
}

/**
 * 判断身份证是否合法
 * @param $number
 * @return bool
 */
function checkIdCard($idCardNo) {
    $regex = '/^[0-9]{1}\d{16}(\d|[x])$/i';
    if(!preg_match($regex, $idCardNo)){
        return false;
    }
    $iW = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
    $szVerCode = "10X98765432";
    $sum = 0;
    for ($i=0; $i<17; $i++) {
        $sum += $idCardNo[$i]*$iW[$i];
    }

    $iy = $sum % 11;
    $verifyBit = $szVerCode[$iy];
    if (strtolower($verifyBit) == strtolower($idCardNo[17]) ) {
        return true;
    }else{
        return false;
    }
}

/**
 * 检测fid
 * @param $id
 * @return bool
 */
function checkFid($id){
    if(preg_match('/^[\da-zA-Z]{32,40}$/i', $id)){
        return true;
    }else{
        return false;
    }
}

/**
 * 判断最属地是否正确
 * @param $val
 * @return bool
 */
function checkArea($val){
    $area = C('legal_preson_area');
    if(in_array($val, array_keys($area))){
        return true;
    }else{
        return false;
    }
}

/**
 * 判断显示名称长度是否合法
 * @param $name
 * @return bool
 */
function checkShowName($name){
    if(getStrLen($name)>48){
        return false;
    }
    return true;
}

/**
 * 检测企业宣传语长度
 * @param $slogan
 * @return bool
 */
function checkSlogan($slogan){
    if(getStrLen($slogan)>60){
        return false;
    }
    return true;
}

/**
 * 检测企业简介长度
 * @param $intro
 * @return bool
 */
function checkIntro($intro){
    if(getStrLen($intro)>450){
        return false;
    }
    return true;
}

/**
 * 获取字符串长度
 * @param $str
 * @param $encoding 编码
 * @return int
 */
function getStrLen($str, $encoding='utf-8'){
    // return mb_strlen($str, $encoding);
    return strlen($str);
}

/**
 * 判断URL是否合法
 * @param $url
 * @return bool
 */
function checkUrl($url){
    $regex = '/^(http|https|HTTP|HTTPS):\/\/.{1,192}$/i';
    if(preg_match($regex, $url)){
        return true;
    }else{
        return false;
    }
}

/**
 * 获取区号
 * @return array|null
 */
function getAreaCode(){
    static $areas = null;
    if(!$areas){
        $areacode = C('areacode');
        foreach($areacode as $key=>$val){
            foreach($val['list'] as $k=>$v){
                $areas[] = $v['areacode'];
            }
        }
    }
    return $areas;
}

/**
 * 判断号码类型是否为座机
 * @param string $tel
 * @return boolean
 */
function isTelephone($tel) {
    $areas = getAreaCode();
    $tel = str_replace('-', '', $tel);
    $pattern = '/^(((0\d{2,3}-)\d{7,8})|((400|800)(\d){7}))$/';
    $tel_area[3] = substr($tel, 0, 3);
    $tel_area[4] = substr($tel, 0, 4);
    foreach ($tel_area as $key => $value) {
        if (in_array($value, $areas, true)) {
            $data['tel_area'] = $value;
            $data['tel_num'] = substr($tel, $key);
            break;
        }
    }
    if (!isset($data['tel_num'])) {
        return false;
    }
    $new_tel = $data['tel_area'] . '-' . $data['tel_num'];
    if (!preg_match($pattern, $new_tel)) {
        return false;
    }
    return true;
}

/**
 * 判断号码类型是否为手机
 * @param string $tel
 * @return boolean
 */
function isMobile($tel) {
    $pattern = '/^1(3|4|5|7|8)\d{9}$/';
    $tel = substr($tel, 0, 1) === '0' ? substr($tel, 1) : $tel;
    if (preg_match($pattern, $tel)) {
        return true;
    }else{
        return false;
    }
}

/**
 * 判断号码类型是否为热线
 * @param string $tel
 * @param boolean $area 是否带区号
 * @return boolean
 */
function isHotline($tel, $area=false) {
    $pattern = '/^(((400|800)(\d){7})|(95[0-9]{3,8})|((0\d{2,3}-)?96\d{3,8})|(1[0-9]{4})|1010\d{3,6})$/';
    if (preg_match($pattern, $tel)) {
        return true;
    }elseif($area){
        $tel = str_replace('-', '', $tel);
        $areacode = getAreaCode();
        $tel_area[3] = substr($tel, 0, 3);
        $tel_area[4] = substr($tel, 0, 4);
        foreach ($tel_area as $key => $value) {
            if (in_array($value, $areacode, true)) {
                if (preg_match($pattern, substr($tel, $key))) {
                    return true;
                }else{
                    return false;
                }
            }
        }
        return false;
    }else{
        return false;
    }
}

/**
 * 判断号码类型是否为短信
 * @param string $tel
 * @return boolean
 */
function isSMS($tel) {
    $pattern = '/[\d]/';
    if (preg_match($pattern, $tel)) {
        return true;
    }else{
        return false;
    }
}

/**
 * 检测经度
 * @param $longitude
 * @return bool
 */
function checkLongitude($longitude){
    if(preg_match('/^[\-\+]?(0?\d{1,2}\.\d{1,6}|1[0-7]?\d{1}\.\d{1,6}|180\.0{1,6})$/', $longitude)){
        return true;
    }else{
        return false;
    }
}

/**
 * 检测纬度
 * @param $latitude
 * @return bool
 */
function checkLatitude($latitude){
    if(preg_match('/^[\-\+]?([0-8]?\d{1}\.\d{1,6}|90\.0{1,6})$/', $latitude)){
        return true;
    }else{
        return false;
    }
}

/**
 * 功能：剔除危险的字符信息
 * @param string $val
 * @return string 返回处理后的字符串
 */
function remove_xss($val) {
    // remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed
    // this prevents some character re-spacing such as <java\0script>
    // note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs
    $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val);

    // straight replacements, the user should never need these since they're normal characters
    // this prevents like <IMG SRC=@avascript:alert('XSS')>
    $search = 'abcdefghijklmnopqrstuvwxyz';
    $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $search .= '1234567890!@#$%^&*()';
    $search .= '~`";:?+/={}[]-_|\'\\';
    for ($i = 0; $i < strlen($search); $i++) {
        // ;? matches the ;, which is optional
        // 0{0,7} matches any padded zeros, which are optional and go up to 8 chars
        // @ @ search for the hex values
        $val = preg_replace('/(&#[xX]0{0,8}' . dechex(ord($search[$i])) . ';?)/i', $search[$i], $val); // with a ;
        // @ @ 0{0,7} matches '0' zero to seven times
        $val = preg_replace('/(&#0{0,8}' . ord($search[$i]) . ';?)/', $search[$i], $val); // with a ;
    }

    // now the only remaining whitespace attacks are \t, \n, and \r
    $ra1 = array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
    $ra2 = array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
    $ra = array_merge($ra1, $ra2);

    $found = true; // keep replacing as long as the previous round replaced something
    while ($found == true) {
        $val_before = $val;
        for ($i = 0; $i < sizeof($ra); $i++) {
            $pattern = '/';
            for ($j = 0; $j < strlen($ra[$i]); $j++) {
                if ($j > 0) {
                    $pattern .= '(';
                    $pattern .= '(&#[xX]0{0,8}([9ab]);)';
                    $pattern .= '|';
                    $pattern .= '|(&#0{0,8}([9|10|13]);)';
                    $pattern .= ')*';
                }
                $pattern .= $ra[$i][$j];
            }
            $pattern .= '/i';
            $replacement = substr($ra[$i], 0, 2) . '<x>' . substr($ra[$i], 2); // add in <> to nerf the tag
            $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags
            if ($val_before == $val) {
                // no replacements were made, so exit the loop
                $found = false;
            }
        }
    }
    return $val;
}

/**
 * 分页
 * @param  string  $url      分页url
 * @param  int     $count    数据总数
 * @param  int     $page     当前页数
 * @param  int     $pageSize 每页显示数量
 * @param  int     $p        分分页参数
 * @param  int     $type      
 * @param  int     $maxPageSize 最大页数，0不限制
 * @return string
 */
function page($url, $count, $page=1, $pageSize=10, $p='page', $type=1, $maxPageSize=0){
    $range = 10;  
    $range_half = $range/2;
    $range_half_ceil = ceil($range/2);  
    $pageCount = ceil($count/$pageSize);

    //设置最大页数
    if($maxPageSize>0 && $pageCount>$maxPageSize){
        $pageCount = $maxPageSize;
    }

    if($type==2){
        // $url .= ((strpos($url, '?')!==false) ? '&' : '?').$p.'=';
        $url .= substr($url, -1, 1)=='/' ? $p : '/'.$p;
    }else{
        $url .= ((strpos($url, '?')!==false) ? '&' : '?').$p.'=';
    }

    if($pageSize>=$count || $page>$pageCount){
        return '';
    }

    $html = '<ul class="pagination">';
    if($page>1){
        $html .= '<li><a href="'.$url.($page-1).'" class="_prev">上一页</a></li>';
    }

    for($i=1; $i<=$range; $i++){
        if($page-$range_half <= 0){
            $_page = $i;
        }elseif($page+$range_half-1 >= $pageCount){
            $_page = $pageCount - $range + $i;
        }else{
            $_page = $page - $range_half_ceil + $i;
        }

        if($_page>0 && $_page!=$page && $page>0){
            if($_page <= $pageCount){
                $html .= '<li><a href="'.$url.$_page.'">'.$_page.'</a></li>';
            }else{
                break;
            }
        }else{
            if($_page>0){
                $html .= '<li><a href="javascript:void(0)" class="active">'.$_page.'</a></li>';
                // $html .= '<a href="javascript:void(0)" class="active">'.$_page.'</a>'
            }
        }         
    }

    if($page < $pageCount){
        $html .= '<li><a href="'.$url.($page+1).'" class="_next">下一页</a></li>';
    }
    $html .= '</ul>';

    return $html;
}

/**
 * 获取用户认证信息
 * @param $id  号码或商户sid
 * @param $type 1,号码  2: sid
 * @return array
 */
function resolvetel($id, $type=1){
    $signStr = 'SkiWsy<uid>zxqrm2j<tel>Rvb2<uid>KNbf<apikey>qwhpr2<tel>';

    $signStr = str_replace('<uid>', C('resolvetel.uid'), $signStr);
    $signStr = str_replace('<apikey>', C('resolvetel.apikey'), $signStr);
    if($type==1){
        $signStr = str_replace('<tel>', $id, $signStr);
    }else{
        $signStr = str_replace('<tel>', '', $signStr);
    }

    $sign = substr(sha1($signStr), 5, 32);

    $url = C('resolvetel.url');
    $param['apikey'] = C('resolvetel.apikey');
    $param['uid'] = C('resolvetel.uid');
    $param['sig'] = $sign;
    if($type==2){
        $param['sid'] = $id;
    }else{
        $param['tel'] = $id;
    }

    $result = curl($url, $param, false);
    if($result['httpcode']=='200' && $result['data']){
        $data = json_decode($result['data'], true);
        if($data['status']==0){
            return $data;
        }
    }
    return array();
}

/**
 * 获取时间戳，兼容 strtotime大于2038年
 * @param int $var1
 * @param int $var2
 * @return int|string
 */
function funStrtotime($var1=0,$var2=0){
    if(!$var2){
        $var2 = $var1;
        $var1 = 0;
    }
    if(is_numeric($var2)){
        $var2 = '@'.$var2;
    }
    try{
        $date  =  new DateTime($var2);
        $date->setTimezone(new DateTimeZone(date_default_timezone_get()));
    }catch(Exception $e){ $date = 0;}
    if(is_object($date)){
        if($var1)
            $date->modify($var1);
        return $date->format('U');
    }else{
        return 0;
    }
}