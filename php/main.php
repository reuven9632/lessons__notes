<?php
  //открываю сессию в начале кода
  session_start();  

  if (isset($_POST["send"])) {            //если нажата кнопка отправить то начинаем выполнение кода
    //переназначаем переменные для более удобного пользования
    //также используем htmlspecialchars() для проверки коректного ввода нанных 
    $from = htmlspecialchars($_POST["from"]);              
    $to   = htmlspecialchars($_POST["to"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);
    
    //создаю переменные сессии для того чтобы если пользователь неверно ввел часть данных при перезагрузке страницыему не притшлось заново их вводить, так как переменные сессии буду фозвращать в код html формы в атрибут value
    $_SESSION["from"] = $from;
    $_SESSION["to"] = $to;
    $_SESSION["subject"] = $subject;
    $_SESSION["message"] = $message;

    //создаю  пустые переменные для вывода текста ошибки
    $error_from = "";
    $error_to = "";
    $error_subject = "";
    $error_message = "";

    $haveSomeError = false;


    //проверяю каждую из заданных переменных на ошибку неверного ввода данных и вывожу 
    if ($from == "" || !preg_match("/@/", $from)){
      $error_from = "Please enter the sender`s Email";
      $haveSomeError = true;
      echo "<div class=\"error__from error\">Please enter the sender`s Email</div>";
    }
    if ($to == "" || !preg_match("/@/", $to)){
      $error_to = "Please enter the recipient`s Email";
      $haveSomeError = true;
      echo "<div class=\"error__to error\">Please enter the recipient`s Email</div>";
    }
    if (strlen($subject) <=3){
      $error_subject = "Please enter subject of Email";
      $haveSomeError = true;
      echo "<div class=\"error__subject error\">Please enter subject of Email</div>";
    }
    if (strlen($message) <= 2){
      $error_message = "Please enter message";
      $haveSomeError = true;
      echo "<div class=\"error__message error\">Please enter message</div>";
    }
    if($haveSomeError == false){
      $subject = "?=utf-8?B?".base64_encode($subject)."?=";       //такое дополнительное кодирование нужно для коректного восприятия от mail.ru
      $headers = "From: $from\r\nReply-to: $from\r\nContent-type: text/plain; charset=utf-8\r\n";     //Content-type: - какой будет текст сообщения, например text/plain; - только обычный текст, text/html; -текст с возможностью использования записи в нем html тегов
      mail($to, $subject, $message, $headers);
      header ("location: success.php?send=1");        //добавляю ?send=1 для GET запроса чтобы убедиться что пользователь не просто перешел по ссылке схитрив
      exit;
    }



    echo print_r($_POST)."<br/>";
    echo print_r($_SESSION)."<br/>";

  }
  
  



  if (isset($_POST["enterButton"])){
    echo $_SERVER["REMOTE_ADDR"];
  }


?>
