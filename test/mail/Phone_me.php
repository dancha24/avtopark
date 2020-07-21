<head>
<meta http-equiv="Refresh" content="30; url=http://xn--42-6kcaj3c0aikq.xn--p1ai/">
<link href="../css/bootstrap.css" rel="stylesheet">
</head>
<?php

$config['smtp_username'] = 'info@xn--42-6kcaj3c0aikq.xn--p1ai';  //Смените на адрес своего почтового ящика.
$config['smtp_port'] = '587'; // Порт работы.
$config['smtp_host'] =  'mx1.hostinger.ru';  //сервер для отправки почты
$config['smtp_password'] = '03081998';  //Измените пароль
$config['smtp_debug'] = true;  //Если Вы хотите видеть сообщения ошибок, укажите true вместо false
$config['smtp_charset'] = 'utf-8';	//кодировка сообщений. (windows-1251 или utf-8, итд)
$config['smtp_from'] = 'Автопарк'; //Ваше имя - или имя Вашего сайта. Будет показывать при прочтении в поле "От кого"
	
function smtpmail($to='', $mail_to, $subject, $message, $headers='') {
	global $config;
	$SEND =	"Date: ".date("D, d M Y H:i:s") . " UT\r\n";
	$SEND .= 'Subject: =?'.$config['smtp_charset'].'?B?'.base64_encode($subject)."=?=\r\n";
	if ($headers) $SEND .= $headers."\r\n\r\n";
	else
	{
			$SEND .= "Reply-To: ".$config['smtp_username']."\r\n";
			$SEND .= "To: \"=?".$config['smtp_charset']."?B?".base64_encode($to)."=?=\" <$mail_to>\r\n";
			$SEND .= "MIME-Version: 1.0\r\n";
			$SEND .= "Content-Type: text/html; charset=\"".$config['smtp_charset']."\"\r\n";
			$SEND .= "Content-Transfer-Encoding: 8bit\r\n";
			$SEND .= "From: \"=?".$config['smtp_charset']."?B?".base64_encode($config['smtp_from'])."=?=\" <".$config['smtp_username'].">\r\n";
			$SEND .= "X-Priority: 3\r\n\r\n";
	}
	$SEND .=  $message."\r\n";
	 if( !$socket = fsockopen($config['smtp_host'], $config['smtp_port'], $errno, $errstr, 30) ) {
		if ($config['smtp_debug']) echo $errno."<br>".$errstr;
		return false;
	 }
 
	if (!server_parse($socket, "220", __LINE__)) return false;
 
	fputs($socket, "HELO " . $config['smtp_host'] . "\r\n");
	if (!server_parse($socket, "250", __LINE__)) {
		if ($config['smtp_debug']) echo '<p>Не могу отправить HELO!</p>';
		fclose($socket);
		return false;
	}
	fputs($socket, "AUTH LOGIN\r\n");
	if (!server_parse($socket, "334", __LINE__)) {
		if ($config['smtp_debug']) echo '<p>Не могу найти ответ на запрос авторизаци.</p>';
		fclose($socket);
		return false;
	}
	fputs($socket, base64_encode($config['smtp_username']) . "\r\n");
	if (!server_parse($socket, "334", __LINE__)) {
		if ($config['smtp_debug']) echo '<p>Логин авторизации не был принят сервером!</p>';
		fclose($socket);
		return false;
	}
	fputs($socket, base64_encode($config['smtp_password']) . "\r\n");
	if (!server_parse($socket, "235", __LINE__)) {
		if ($config['smtp_debug']) echo '<p>Пароль не был принят сервером как верный! Ошибка авторизации!</p>';
		fclose($socket);
		return false;
	}
	fputs($socket, "MAIL FROM: <".$config['smtp_username'].">\r\n");
	if (!server_parse($socket, "250", __LINE__)) {
		if ($config['smtp_debug']) echo '<p>Не могу отправить комманду MAIL FROM: </p>';
		fclose($socket);
		return false;
	}
	fputs($socket, "RCPT TO: <" . $mail_to . ">\r\n");
 
	if (!server_parse($socket, "250", __LINE__)) {
		if ($config['smtp_debug']) echo '<p>Не могу отправить комманду RCPT TO: </p>';
		fclose($socket);
		return false;
	}
	fputs($socket, "DATA\r\n");
 
	if (!server_parse($socket, "354", __LINE__)) {
		if ($config['smtp_debug']) echo '<p>Не могу отправить комманду DATA</p>';
		fclose($socket);
		return false;
	}
	fputs($socket, $SEND."\r\n.\r\n");
 
	if (!server_parse($socket, "250", __LINE__)) {
		if ($config['smtp_debug']) echo '<p>Не смог отправить тело письма. Письмо не было отправленно!</p>';
		fclose($socket);
		return false;
	}
	fputs($socket, "QUIT\r\n");
	fclose($socket);
	return TRUE;
}

function server_parse($socket, $response, $line = __LINE__) {
	global $config;
	while (@substr($server_response, 3, 1) != ' ') {
		if (!($server_response = fgets($socket, 256))) {
			if ($config['smtp_debug']) echo "<p>Проблемы с отправкой почты!</p>$response<br>$line<br>";
 			return false;
 		}
	}
	if (!(substr($server_response, 0, 3) == $response)) {
		if ($config['smtp_debug']) echo "<p>Проблемы с отправкой почты!</p>$response<br>$line<br>";
		return false;
	}
	return true;
}

$username = $_POST['name'];   // сохраняем в переменную данные полученные из поля c именем
$usertel = $_POST['phone']; // сохраняем в переменную данные полученные из поля c телефонным номером

// Формирование тела письма
$msg  = "<html><body style='font-family:Arial,sans-serif;'>";
$msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Cообщение с сайта</h2>\r\n";
$msg .= "<p><strong>От кого:</strong> ".$username."</p>\r\n";
//$msg .= "<p><strong>Почта:</strong> ".$usermail."</p>\r\n";
$msg .= "<p><strong>Сайт:</strong> ".$usertel."</p>\r\n";
$msg .= "</body></html>";

smtpmail('Dan', 'dancha241@gmail.com', 'Новая заявка', $msg);

if (isset($_POST['name']) && isset($_POST['phone'])){

    // Переменные с формы
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    
    // Параметры для подключения
    $db_host = "localhost"; 
    $db_user = "u512433305_acc"; // Логин БД
    $db_password = "03081998"; // Пароль БД
    $db_base = 'u512433305_acc'; // Имя БД
    $db_table = "mail"; // Имя Таблицы БД
    
    // Подключение к базе данных
    $mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);

    // Если есть ошибка соединения, выводим её и убиваем подключение
	if ($mysqli->connect_error) {
	    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
    
    $result = $mysqli->query("INSERT INTO ".$db_table." (site,variant,name,phone) VALUES ('Автопарк','2','$name','$phone')");
    
    if ($result == true){
    	echo "<div class='container'>
  <div class='modal-dialog modal-dialog-centered' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel' align='center'>Успешно!</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        
        <h2 align='center' style='color:#0096A3'>ПОЗДРАВЛЯЕМ!</h2>

<h2 align='center' style='color:#0096A3'>ВАША ЗАЯВКА ПРИНЯТА!</h2>
<p align='center'><strong>В течение 15 минут</strong> Вам перезвонит наш менеджер для того, чтобы проконсультировать Вас.</p>
<p align='center'>Пожалуйста, не выключайте свой телефон, <strong>потому что</strong>, это позволит нам связаться с Вами.
  Наш менеджер позвонит Вам с номера <strong>8 (951) 599-00-99</strong></p>
<h1 align='center' style='color:#0096A3'>Спасибо что выбрали нас!</h1>
 <a href='../index.html'  class='btn btn-warning w-100' >Вернуться назад</a>     
	  </div>
    </div>
    </div>
</div>";
    }else{
    	echo "<div class='container'>
  <div class='modal-dialog modal-dialog-centered' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel' align='center'>Ошибка!</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        
        <h2 align='center' style='color:#0096A3'>Что-то пошло не так</h2>
<p align='center'>Заявка не отправлена, повторите попытку позже</p>
 <a href='../index.html'  class='btn btn-warning w-100' >Вернуться назад</a>     
	  </div>
    </div>
    </div>
</div>";
    }
}
?>