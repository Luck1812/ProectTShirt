<?php 

$func = $_GET['func_user'];
if ($func === 'func_add_user') {
	$arr['email'] = $_GET['email'];
	$arr['pass'] = $_GET['pass'];
	echo json_encode($arr);
    $text = $_GET['txt'];
    $connection = mysqli_connect('localhost', 'root', '', 'tshirt');
    $sql = "INSERT INTO `registration_user` (`ID`, `E-mail`, `Password`) VALUES (NULL, '$arr[email]', '$arr[pass]')";
    $massive = mysqli_query($connection, $sql);
    mysqli_close($connection);
}

else if ($func === 'func_login_user') {
    $arr['email'] = $_GET['email'];
	$arr['pass'] = $_GET['pass'];
    $connection = mysqli_connect('localhost', 'root', '', 'tshirt');
    $sql = "SELECT * FROM `registration_user` WHERE `E-mail` = '$arr[email]' and `Password` = '$arr[pass]';"; 
    $massive = mysqli_query($connection, $sql);
    mysqli_close($connection);
    foreach($massive as $value){
        echo is_array($value);
    }
}
?>
