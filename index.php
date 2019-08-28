<?php
  require "db";
  if (isset($_POST['send'])){
    if(trim($_POST['name']) == "" || trim($_POST['message']) == ""){
      $err = "Заполните пустые поля!";
    } else {
  $comment = R::dispense('comment');
  $comment->name = $_POST['name'];
  $comment->message = $_POST['message'];

  R::store($comment);
  header('location: index.php');
}
 
}
?>


<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" href="css/style.css">
	   <title>Work</title>
</head>
<body class="bodies">

   <header class ="tophead">
   		<center><strong>Колеса<img src="css/znak.png" style="height:50px; width: 50px; margin-top: 20px;">РУ</strong> </center>
   </header><br>

   <div class="cent">
   	<div>
      <br><br><br>
      <strong>Товары по запросу "Колеса Asphalt"</strong>
   		<div style="height:100px"> </div>

      <center>

   			<div class="tovar">
          <br>
            Колеса автомобильные
   	        <img src="css/tire-wheel-png.png" style="align-self: center; height: 200px;width: 200px; margin-top: 20px;">
   	        Колеса Asphalt.<br> Количество - 4 шт.<br> Тип - летние.
   			</div>
		  </center>

		<div style="height:200px"></div>
   	</div>
   </div>
<div style="margin-top: 30px;"> <center> <strong>Оставляйте ваши комментарии по данному товару</strong> </center> <br></div>
	<form class="form" action="" method="post" enctype="multipart/form-data">
	     <input class="inp" type="text" name="name" placeholder="Введите ваше имя"><br><br>
	     <textarea class="inp" type="text" name="message" placeholder="Сообщение"></textarea>
	     <div style="clear:both"><br><br></div>
      
       <input class ="inp" type="submit" name="send">
       
       <?= '<div style="color:red">'.$err.'</div>' ?>
  </form>
  <div style="float: right; width:600px; margin-right: 150px; ">
<?php $komen = mysqli_query($con, "SELECT * FROM comment") ?>
<?php while($kom = mysqli_fetch_assoc($komen)) { ?>
   
     <div class="comments">
    	<div class="name"><?= $kom['name'] ?></div>
    	<hr style="width: 500px; float: left;">
    	<div class="message"><?= $kom['message'] ?></div><br>
     
      
    </div>

<?php } ?>
</div>
</body>
</html>