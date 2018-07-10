<?php
include 'db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">

</head>
<body onload="ajax();">
	<div id="container">
		<div id="chat_box">
			<div id="chat">

			</div>
		</div>
		<form method="post" action="index.php">
			<input type="text" name="name" placeholder="enter name">
			<textarea name="message" placeholder="enter your message" ></textarea>
		  <input type="submit" name="submit" value="send it">
		</form>
		<?php
   if(isset($_POST['submit'])){
   $name = $_POST['name'];
   $message = $_POST['message'];

   $query = "INSERT INTO info(name, message) values ('$name', '$message')";
   $run = $db->query($query);
   if($run){
   	echo "<ebmed loop='false' hidden='true' autoplay='true'/>";
   }
   }

		?>
	</div>
		<script>
	 const ajax = () =>{
   let req = new XMLHttpRequest();    
    req.onreadystatechange  = ()=>{
   	if(req.readyState == 4 && req.status == 200){
   	document.getElementById('chat').innerHTML = req.responseText;
    }
  }
req.open('GET', 'chat.php', true);
req.send();
}
setInterval(()=>{ajax()},1000);
	</script>
</body>
</html>