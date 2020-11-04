<!DOCTYPE html> 
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>LessonsOfDeveloper</title>
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans:100,300,400,500,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <section class="feedBackForm-section">
    <form name="feedBackForm" action="php/main.php" method="POST">          <!--   action="feedBackForm.php" -  указывает какой файл будет обрабатывать форму -->
      <h2>ФОРМА ОБРАТНОЙ СВЯЗИ</h2>
  
      <label>от кого:<label/><br/>
      <input type="text" name="from" placeholder="Введите Email адрес отправителя"/><br/>
  
      <label>Кому:<label/><br/>
      <input type="text" name="to" placeholder="Введите Email адрес получателя"/><br/>
  
      <label>Тема:<label/><br/>
      <input type=""text" name="subject" placeholder="Введите тему"/><br/>
  
      <label>message:<label/><br/>
      <teextarea  name="message" cols="40" rows="10"></textarea><br/>
  
      <input type="submit" name="send" value="отправить"/>
  </form>
  </section>
  
  <section class="look_IP-php">
    <form method="post" action="php/main.php">
      <label for="name">name: </label>
      <input type="text" name="name" placeholder="enter name here">
      <button name="enterButton">enter</button>
    </form>
    <!-- <?php echo $_SERVER["REMOTE_ADDR"];?>  -->
  </section>
  
  <section class="test__animation-section">
    <div class="container">
      <!-- /////////////////////////////////////////////// -->
      <div class="test_1">test_animation</div>
      <div class="test_2">test_animation</div>
      <div class="test_3">test_animation</div> 
      <!-- ///////////////////////////////////////////////
      //test-muving
      /////////////////////////////////////////////// -->
      <div class="test-muving">
        <img class="test-muving__img-1" src="images/test-muving__img-1.webp" alt="">
        <div class="test-muving__text">img-1</div>
      </div>
      <!-- /////////////////////////////////////////////// -->
    </div>  
  </section>
  
</body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- <script src="js/libs.min.js"></script> -->
  <script src="js/main.js"></script>
</html>
