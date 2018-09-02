<?php
empty($_GET['ver']) && $_GET['ver']="auto";
empty($_GET['channel']) && $_GET['channel']="stable";
empty($_GET['mode']) && $_GET['mode']="direct";
if($_GET['ver']=="auto"){
    $sbit=get_sys_bit();
    switch($sbit){
        case 2:
            $_GET['ver']="win64";
            break;
        case 1:
            $_GET['ver']="win";
            break;
        default:
        exit();
    }
}
//预制测试变量
$ver=$_GET['ver'];
$channel=$_GET['channel'];
$mode=$_GET['mode'];
//储存数据列表
$data_stable_x86="<?xml version='1.0' encoding='UTF-8'?>
            <request protocol='3.0' version='1.3.23.9' shell_version='1.3.21.103' ismachine='0'
                     sessionid='{3597644B-2952-4F92-AE55-D315F45F80A5}' installsource='ondemandcheckforupdate'
                     requestid='{CD7523AD-A40D-49F4-AEEF-8C114B804658}' dedup='cr'>
            <hw sse='1' sse2='1' sse3='1' ssse3='1' sse41='1' sse42='1' avx='1' physmemory='12582912' />
            <os platform='win' version='6.3' arch='x86'/>
            <app appid='{8A69D345-D564-463C-AFF1-A69D9E530F96}' ap='-multi-chrome' version='' nextversion='' lang='' brand='GGLS' client=''>
                <updatecheck/>
            </app>
            </request>";
$data_stable_x64="<?xml version='1.0' encoding='UTF-8'?>
<request protocol='3.0' version='1.3.23.9' shell_version='1.3.21.103' ismachine='0'
         sessionid='{3597644B-2952-4F92-AE55-D315F45F80A5}' installsource='ondemandcheckforupdate'
         requestid='{CD7523AD-A40D-49F4-AEEF-8C114B804658}' dedup='cr'>
<hw sse='1' sse2='1' sse3='1' ssse3='1' sse41='1' sse42='1' avx='1' physmemory='12582912' />
<os platform='win' version='6.3' arch='x64'/>
<app appid='{8A69D345-D564-463C-AFF1-A69D9E530F96}' ap='x64-stable-multi-chrome' version='' nextversion='' lang='' brand='GGLS' client=''>
    <updatecheck/>
</app>
</request>";
$data_beta_x86="<?xml version='1.0' encoding='UTF-8'?>
<request protocol='3.0' version='1.3.23.9' shell_version='1.3.21.103' ismachine='0'
         sessionid='{3597644B-2952-4F92-AE55-D315F45F80A5}' installsource='ondemandcheckforupdate'
         requestid='{CD7523AD-A40D-49F4-AEEF-8C114B804658}' dedup='cr'>
<hw sse='1' sse2='1' sse3='1' ssse3='1' sse41='1' sse42='1' avx='1' physmemory='12582912' />
<os platform='win' version='6.3' arch='x86'/>
<app appid='{8A69D345-D564-463C-AFF1-A69D9E530F96}' ap='1.1-beta' version='' nextversion='' lang='' brand='GGLS' client=''>
    <updatecheck/>
</app>
</request>";
$data_beta_x64="<?xml version='1.0' encoding='UTF-8'?>
<request protocol='3.0' version='1.3.23.9' shell_version='1.3.21.103' ismachine='0'
         sessionid='{3597644B-2952-4F92-AE55-D315F45F80A5}' installsource='ondemandcheckforupdate'
         requestid='{CD7523AD-A40D-49F4-AEEF-8C114B804658}' dedup='cr'>
<hw sse='1' sse2='1' sse3='1' ssse3='1' sse41='1' sse42='1' avx='1' physmemory='12582912' />
<os platform='win' version='6.3' arch='x64'/>
<app appid='{8A69D345-D564-463C-AFF1-A69D9E530F96}' ap='x64-beta-multi-chrome' version='' nextversion='' lang='' brand='GGLS' client=''>
    <updatecheck/>
</app>
</request>";
$data_dev_x86="<?xml version='1.0' encoding='UTF-8'?>
<request protocol='3.0' version='1.3.23.9' shell_version='1.3.21.103' ismachine='0'
         sessionid='{3597644B-2952-4F92-AE55-D315F45F80A5}' installsource='ondemandcheckforupdate'
         requestid='{CD7523AD-A40D-49F4-AEEF-8C114B804658}' dedup='cr'>
<hw sse='1' sse2='1' sse3='1' ssse3='1' sse41='1' sse42='1' avx='1' physmemory='12582912' />
<os platform='win' version='6.3' arch='x86'/>
<app appid='{8A69D345-D564-463C-AFF1-A69D9E530F96}' ap='2.0-dev' version='' nextversion='' lang='' brand='GGLS' client=''>
    <updatecheck/>
</app>
</request>";
$data_dev_x64="<?xml version='1.0' encoding='UTF-8'?>
<request protocol='3.0' version='1.3.23.9' shell_version='1.3.21.103' ismachine='0'
         sessionid='{3597644B-2952-4F92-AE55-D315F45F80A5}' installsource='ondemandcheckforupdate'
         requestid='{CD7523AD-A40D-49F4-AEEF-8C114B804658}' dedup='cr'>
<hw sse='1' sse2='1' sse3='1' ssse3='1' sse41='1' sse42='1' avx='1' physmemory='12582912' />
<os platform='win' version='6.3' arch='x64'/>
<app appid='{8A69D345-D564-463C-AFF1-A69D9E530F96}' ap='x64-dev-multi-chrome' version='' nextversion='' lang='' brand='GGLS' client=''>
    <updatecheck/>
</app>
</request>";
$data_canary_x86="<?xml version='1.0' encoding='UTF-8'?>
<request protocol='3.0' version='1.3.23.9' shell_version='1.3.21.103' ismachine='0'
         sessionid='{3597644B-2952-4F92-AE55-D315F45F80A5}' installsource='ondemandcheckforupdate'
         requestid='{CD7523AD-A40D-49F4-AEEF-8C114B804658}' dedup='cr'>
<hw sse='1' sse2='1' sse3='1' ssse3='1' sse41='1' sse42='1' avx='1' physmemory='12582912' />
<os platform='win' version='6.3' arch='x86'/>
<app appid='{4EA16AC7-FD5A-47C3-875B-DBF4A2008C20}' ap='' version='' nextversion='' lang='' brand='GGLS' client=''>
    <updatecheck/>
</app>
</request>";
$data_canary_x64="<?xml version='1.0' encoding='UTF-8'?>
<request protocol='3.0' version='1.3.23.9' shell_version='1.3.21.103' ismachine='0'
         sessionid='{3597644B-2952-4F92-AE55-D315F45F80A5}' installsource='ondemandcheckforupdate'
         requestid='{CD7523AD-A40D-49F4-AEEF-8C114B804658}' dedup='cr'>
<hw sse='1' sse2='1' sse3='1' ssse3='1' sse41='1' sse42='1' avx='1' physmemory='12582912' />
<os platform='win' version='6.3' arch='x64'/>
<app appid='{4EA16AC7-FD5A-47C3-875B-DBF4A2008C20}' ap='x64-canary' version='' nextversion='' lang='' brand='GGLS' client=''>
    <updatecheck/>
</app>
</request>";
$data=$data_stable_x64;
switch($channel){
    case "stable":
        if($ver=="win64"){
            $data=$data_stable_x64;
        }elseif($ver=="win"){
            $data=$data_stable_x86;
        }
    break;
    case "beta":
        if($ver=="win64"){
            $data=$data_beta_x64;
        }elseif($ver=="win"){
            $data=$data_beta_x86;
        }
    break;
    case "dev":
        if($ver=="win64"){
            $data=$data_dev_x64;
        }elseif($ver=="win"){
            $data=$data_dev_x86;
        }
    break;
    case "canary":
        if($ver=="win64"){
            $data=$data_canary_x64;
        }elseif($ver=="win"){
            $data=$data_canary_x86;
        }
    break;
    default:
    exit;
}
$opt=request_post("https://tools.google.com/service/update2",$data) ;
$x=Put_Data($opt);
if($mode=="debug"){
    $x['debuginfo']=$channel."-".$ver;
    print_r($x);
    exit;
}
if($mode=="json"){
    echo json_encode($x);
    exit;
}
if($mode=="direct"){
    header("location:".$x['Chrome_download']);
    exit;
}
function request_post($url = '', $param = '') {
//echo 'posted_1';
        if (empty($url) || empty($param)) {
            return false;
        }
        
        $postUrl = $url;
        $curlPost = $param;
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
curl_setopt($ch,CURLOPT_TIMEOUT, 60); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
		//echo 'posted';
        $data = curl_exec($ch);//运行curl
 		//echo 'Curl error: ' . curl_error($ch);
        curl_close($ch);
        //echo "b".$data;
        return $data;
    }
function Put_Data($data){

        $addresspos=strpos($data,'<url codebase="http://dl.google.com');
        $tailpos=strpos($data,'"/>',$addresspos);
        $address=substr($data,$addresspos+15,$tailpos-($addresspos+15));
        $hashstartpos=strpos($data,'hash_sha256="',0);
        $tailpos=strpos($data,'" name="',$addresspos);
        $hash=substr($data,$hashstartpos+13,$tailpos-$hashstartpos-13);
        $filenamestartpos=strpos($data,'" name="',0);
        $tailpos=strpos($data,'" required=',$filenamestartpos);
        $filename=substr($data,$filenamestartpos+8,$tailpos-$filenamestartpos-8);
        $sizepos=strpos($data,' size="',0);
        $tailpos=strpos($data,'"/>',$sizepos);
        $size=substr($data,$sizepos+7,$tailpos-$sizepos-7);
        $verpos=strpos($data,'<manifest version="',0);
        $tailpos=strpos($data,'">',$verpos);
        $ver=substr($data,$verpos+19,$tailpos-$verpos-19);
        $p['Query_date']=time();
        $p['Chrome_version']=$ver;
        $p['Chrome_download']=$address.$filename;
        $p['Chrome_sha256']=$hash;
        $p['Chrome_size']=$size;
        return $p;
}
function get_sys_bit(){
    $data=$_SERVER['HTTP_USER_AGENT'];
    if($data=="") return -1;
    $a=preg_match("/x86_64|Win64|WOW64/",$data);
    if($a!=0){
        return 2;
    }else{
        $b=preg_match("/Win|Mac|Linux/",$data);
        if($b!=0){
            return 1;
        }else{
            return -1;
        }
    }
}   
?>
