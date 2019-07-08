<?php
include_once('_common.php');

if ($is_guest)
    alert('로그인 한 회원만 접근하실 수 있습니다.', G5_BBS_URL.'/login.php');

/*
if ($url)
    $urlencode = urlencode($url);
else
    $urlencode = urlencode($_SERVER[REQUEST_URI]);
*/

//소셜 로그인 한 경우
if( function_exists('social_member_comfirm_redirect') ){    
    social_member_comfirm_redirect();
}

$g5['title'] = '회원 비밀번호 확인';
include_once('_head.sub.php');

$url = clean_xss_tags($_GET['url']);

// url 체크
check_url_host($url, '', G5_URL, true);

if( preg_match('#^/{3,}#', $url) ){
    $url = preg_replace('#^/{3,}#', '/', $url);
}

$url = get_text($url);

include_once($member_skin_path.'/member_confirm.skin.php');

include_once('_tail.sub.php');
?>
