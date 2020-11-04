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


    //проверяю каждую из заданных переменных на ошибку неверного ввода данных и вывожу 
    if (trim($from) == "")
        echo "<div class=\"error__from error\">Please enter the sender`s Email</div>";
    if (trim($to) == "")
        echo "<div class=\"error__to error\">Please enter the recipient`s Email</div>";
    if (trim($subject) == "")
        echo "<div class=\"error__subject error\">Please enter subject of Email</div>";
    if (trim($message) == "")
        echo "<div class=\"error__message error\">Please enter message of Email</div>";
  }
  
  



  if (isset($_POST["enterButton"])){
    echo $_SERVER["REMOTE_ADDR"];
  }


?>
