<h3><?php if(isset($text)){echo $text;}?></h3>
<br>
<form method="post">
    <input type="text" name="user_name" placeholder="Введите логин" required>
    <input type="password" name="user_pswrd" placeholder="Введите пароль" required>
    <input type="submit" name="button" value="Зарегистрировать">
</form>