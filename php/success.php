<?php
    session_start();
    echo "Вы успешно отравили сообщение на адресс ".$_SESSION["to"];
?>