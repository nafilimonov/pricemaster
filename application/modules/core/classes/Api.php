<?php defined('SYSPATH') OR die('No direct script access.');



class Api  {


	/**
   * делаем курл запрос по $url 
   *
   * @param url
   * @return respone url
   */
static public function request( $type, $arr, $arFields = false)
{
    
    
    $token = Auth::instance()->get_user()->token;
   
    $url_arg = '';
    foreach ($arr as $key => $value) {
        $url_arg .= '&'.$key.'='.$value;
    }

    $url = Auth::instance()->get_user()->siteurl.'/restprice/index.php?token='.$token.'&type='.$type.$url_arg;
    
    if(is_array($arFields))
    {
        $arFields = http_build_query(array('arFields' => $arFields));
        $url .= '&'.$arFields;
       
    }
    $options = array(
        CURLOPT_RETURNTRANSFER => true,     // return web page
        CURLOPT_HEADER         => false,    // don't return headers
        CURLOPT_FOLLOWLOCATION => true,     // follow redirects
        CURLOPT_ENCODING       => "",       // handle all encodings
        CURLOPT_USERAGENT      => "spider", // who am i
        CURLOPT_AUTOREFERER    => true,     // set referer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
        CURLOPT_TIMEOUT        => 120,      // timeout on response
        CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
        CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
    );

    $ch      = curl_init( $url );
    curl_setopt_array( $ch, $options );
    $content = curl_exec( $ch );
    $err     = curl_errno( $ch );
    $errmsg  = curl_error( $ch );
    $header  = curl_getinfo( $ch );
    curl_close( $ch );

    $header['errno']   = $err;
    $header['errmsg']  = $errmsg;
    $header['content'] = $content;
    
    if($content == "error"){
        return false;
    }
    return json_decode($content,true);
    

}


}
