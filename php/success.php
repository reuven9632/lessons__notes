<?php
    session_start();
    if($_GET["send"] == 1)
        echo "Вы успешно отравили сообщение на адресс ".$_SESSION["to"];
?>