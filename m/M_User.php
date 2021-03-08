<?php
include 'config/db.php';

class M_User {

    public $user_id, $user_name, $user_pswrd;

    public function __construct () {
    }

    public function pass ($user_name, $user_pswrd) {
        return strrev(md5($user_name) . SOLT . md5($user_pswrd)); //Проработать случай при хеше более 256 символах
    }

    public function connecting () {
        return new PDO(SQLSRVBS . ':host='. HOSTNAME . ';dbname=' . DB, USERNAME, PASS);
    }

    public function getUser ($user_id) {
        $connect = $this->connecting();
        return $connect->query("SELECT * FROM users WHERE user_id = '" . $user_id . "'")->fetch();
    }

    public function newUser ($user_name, $user_pswrd) {
        $connect = $this->connecting();
        $user = $connect->query("SELECT * FROM users WHERE user_name = '" . $user_name . "'")->fetch();
        if (!$user) {
            $connect->exec("INSERT INTO users (`user_name`, `user_pswrd`) VALUES ('$user_name', 'this->pass('$user_name','$user_pswrd')')");
            return true;
        } else {
            return false;
        }

//
//        $SERVER = "localhost";
//        $DB = "gb_test";
//        $LOGIN = "root";
//        $PASS = "root";
//
//        $conn = mysqli_connect($SERVER,$LOGIN,$PASS,$DB);
//        $sql = "INSERT INTO `users` (`user_name`, `user_pswrd`) VALUES ('$user_name', '$user_pswrd')";
//        mysqli_query($conn, $sql);
    }

    public function login ($user_name, $user_pswrd) {
        $connect = $this->connecting();
        $user = $connect->query("SELECT * FROM users WHERE user_name = '" . $user_name . "'")->fetch();
        if ($user) {
            if ($user['user_pswrd'] == $this->pass($user['user_name'], strip_tags($user_pswrd))) {
                $_SESSION['user_id'] = $user['user_id'];
                return 'Здравствуйте, ' . $user['user_name'] . '!';
            } else {
                return 'Пароль не верный!';
            }
        } else {
            return 'Пользователь не зарегистрирован!';
        }
    }

    public function logout () {
        if (isset($_SESSION["user_id"])) {
            $_SESSION["user_id"]=null;
            session_destroy();
            return true;
        }
        return false;

    }
}
?>