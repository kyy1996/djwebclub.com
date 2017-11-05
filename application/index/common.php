<?php
/**
 * Created by PhpStorm.
 * User: Alen
 * Date: 2017/6/16
 * Time: 23:02
 */

/**
 * @param string $string 原始字符串
 * @param string $operation 要进行的操作
 * @param string $key 密钥
 * @param int $expiry 生命周期
 * @return string 加密/解密后的字符串
 * @Author 孔元元<system@kyy1996.cn>
 **/
function authcode($string, $operation = 'DECODE', $key = 'ztyshop', $expiry = 0)
{
    $ckey_length = 4;
    $key = md5($key);
    $keya = md5(substr($key, 0, 16));
    $keyb = md5(substr($key, 16, 16));
    $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length) : substr(md5(microtime()), -$ckey_length)) : '';

    $cryptkey = $keya . md5($keya . $keyc);
    $key_length = strlen($cryptkey);

    $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0) . substr(md5($string . $keyb), 0, 16) . $string;
    $string_length = strlen($string);

    $result = '';
    $box = range(0, 255);

    $rndkey = array();
    for ($i = 0; $i <= 255; $i++) {
        $rndkey[$i] = ord($cryptkey[$i % $key_length]);
    }

    for ($j = $i = 0; $i < 256; $i++) {
        $j = ($j + $box[$i] + $rndkey[$i]) % 256;
        $tmp = $box[$i];
        $box[$i] = $box[$j];
        $box[$j] = $tmp;
    }

    for ($a = $j = $i = 0; $i < $string_length; $i++) {
        $a = ($a + 1) % 256;
        $j = ($j + $box[$a]) % 256;
        $tmp = $box[$a];
        $box[$a] = $box[$j];
        $box[$j] = $tmp;
        $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
    }

    if ($operation == 'DECODE') {
        if ((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26) . $keyb), 0, 16)) {
            return substr($result, 26);
        } else {
            return '';
        }
    } else {
        return $keyc . str_replace('=', '', base64_encode($result));
    }
}

function is_mobile()
{
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $mobile_agents = Array("240x320", "acer", "acoon", "acs-", "abacho", "ahong", "airness", "alcatel", "amoi", "android", "anywhereyougo.com", "applewebkit/525", "applewebkit/532", "asus", "audio", "au-mic", "avantogo", "becker", "benq", "bilbo", "bird", "blackberry", "blazer", "bleu", "cdm-", "compal", "coolpad", "danger", "dbtel", "dopod", "elaine", "eric", "etouch", "fly ", "fly_", "fly-", "go.web", "goodaccess", "gradiente", "grundig", "haier", "hedy", "hitachi", "htc", "huawei", "hutchison", "inno", "ipad", "ipaq", "ipod", "jbrowser", "kddi", "kgt", "kwc", "lenovo", "lg ", "lg2", "lg3", "lg4", "lg5", "lg7", "lg8", "lg9", "lg-", "lge-", "lge9", "longcos", "maemo", "mercator", "meridian", "micromax", "midp", "mini", "mitsu", "mmm", "mmp", "mobi", "mot-", "moto", "nec-", "netfront", "newgen", "nexian", "nf-browser", "nintendo", "nitro", "nokia", "nook", "novarra", "obigo", "palm", "panasonic", "pantech", "philips", "phone", "pg-", "playstation", "pocket", "pt-", "qc-", "qtek", "rover", "sagem", "sama", "samu", "sanyo", "samsung", "sch-", "scooter", "sec-", "sendo", "sgh-", "sharp", "siemens", "sie-", "softbank", "sony", "spice", "sprint", "spv", "symbian", "tablet", "talkabout", "tcl-", "teleca", "telit", "tianyu", "tim-", "toshiba", "tsm", "up.browser", "utec", "utstar", "verykool", "virgin", "vk-", "voda", "voxtel", "vx", "wap", "wellco", "wig browser", "wii", "windows ce", "wireless", "xda", "xde", "zte");
    $is_mobile = false;
    foreach ($mobile_agents as $device) {
        if (stristr($user_agent, $device)) {
            $is_mobile = true;
            break;
        }
    }
    return $is_mobile;
}


/**********
 * 发送邮件 *
 *********
 * @param $address
 * @param $title
 * @param $message
 * @return bool
 */
function SendMail($address, $title, $message)
{
    vendor('PHPMailer.class#phpmailer');
    $mail = new \PHPMailer();
    // 设置PHPMailer使用SMTP服务器发送Email
    $mail->IsSMTP();
    // 设置邮件的字符编码，若不指定，则为'UTF-8'
    $mail->CharSet = 'UTF-8';
    // 添加收件人地址，可以多次使用来添加多个收件人
    $mail->AddAddress($address);
    // 设置邮件正文
    $mail->Body = $message;
    // 设置邮件头的From字段。
    $mail->From = C('MAIL_ADDRESS');
    // 设置发件人名字
    $mail->FromName = C('MAIL_SENDERNAME');
    // 设置邮件标题
    $mail->Subject = $title;
    // 设置SMTP服务器。
    $mail->Host = C('MAIL_SMTP');
    // 设置为“需要验证”
    $mail->SMTPAuth = true;
    // 设置用户名和密码。
    $mail->Username = C('MAIL_LOGINNAME');
    $mail->Password = C('MAIL_PASSWORD');
    // 发送邮件。
    return ($mail->Send());
}

/**
 * @param $phone
 * @param $message
 * @return bool
 */
function SendSMS($phone, $message)
{
    //if (checkSMS($message) == false) return false;
    /*$url = "http://service.winic.org/sys_port/gateway/?id=" . C("SMS.username") . "&pwd=" . C("SMS.password") . "&to=" . $phone . "&content=" . $message . "&time=";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);

    $return = curl_exec($ch);*/
    $post_data = array();
    $post_data['account'] = iconv('GB2312', 'GB2312', C("SMS.username"));
    $post_data['pswd'] = iconv('GB2312', 'GB2312', C("SMS.password"));
    $post_data['mobile'] = $phone;
    $post_data['msg'] = mb_convert_encoding("$message", 'UTF-8', 'UTF-8');
    $url = 'http://222.73.117.158/msg/HttpBatchSendSM?';
    $o = "";
    foreach ($post_data as $k => $v) {
        $o .= "$k=" . urlencode($v) . "&";
    }
    $post_data = substr($o, 0, -1);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    if ($result === false) return false;
    return true;
    /*$DOM = new DOMDocument();
    $DOM->loadXML($return);
    $response = $DOM->getElementsByTagName("response");
    $result = $response->item(0)->getElementsByTagName("result")->item(0)->nodeValue;*/
    //echo($return);
    //$result = explode(",", $return);
    //$result = intval($result[0]);
    //if (intval($result) < 0) return false;
}

/**
 * @param $content
 * @return bool
 */
function checkSMS($content)
{
    $url = "http://s1.chanyoo.cn/blackdict.txt";
    $handle = @fopen($url, "r");
    if ($handle) {
        while (!feof($handle)) {
            $word = fgets($handle, 4096);
            if (stripos($content, $word) !== false) {
                return false;
            }
        }
        fclose($handle);
    }
    return true;
}

function get_month($month)
{
    $lang = [
        1 => "一月",
        2 => "二月",
        3 => "三月",
        4 => "四月",
        5 => "五月",
        6 => "六月",
        7 => "七月",
        8 => "八月",
        9 => "九月",
        10 => "十月",
        11 => "十一月",
        12 => "十二月"
    ];
    return $lang[intval($month)];
}

function get_week($month, $revert = true)
{
    $lang = [
        1 => "周一",
        2 => "周二",
        3 => "周三",
        4 => "周四",
        5 => "周五",
        6 => "周六",
        7 => "周日",
    ];
    $revert && $lang = array_flip($lang);
    return $lang[$month];
}

function get_action_name($name)
{
    $lang = [
        'index' => '首页',
        'contact' => '联系我们',
        'about' => "关于我们",
        'gallery' => "画廊",
        'activity' => "社团活动",
        'joinus' => "招募令",
        'blog' => '部落格',
        'comment' => '留言',
        'user' => '会员中心',
        'login' => '登录',
        'register' => '注册',
    ];
    return $lang[strtolower($name)];
}