<?include $_SERVER['DOCUMENT_ROOT'].'/classes/autoload.php';
$register = Register::registerUser($_POST);
if($register){
    Header('Location /profile/');
}
echo "<pre>";
var_dump($register);
echo "</pre>";?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <input type="text" name="login">
    <input type="text" name="email">
    <input type="text" name="fio">
    <input type="text" name="password">
    <input type="text" name="password_repeat">
    <input type="submit" value="Регистрация">
</form>
</body>
</html>