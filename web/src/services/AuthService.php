<?php
require_once SERVICES."DBService.php";

class AuthService
{
    public static function login($data = null)
    {
        $sql = DBService::getInstance()->connection;

        $username = $sql->real_escape_string($data["Username"]);
        $password = $sql->real_escape_string($data["Password"]);

        $result = $sql->query("SELECT * FROM USERS WHERE Username = '$username' AND Password = '$password'");

        if ($result->num_rows > 0)
        {
            $user = $result->fetch_assoc();
            setcookie("UserID", $user["UserID"], time() + (86400 * 30), "/");
            return ["success" => true];
        } else
        {
            http_response_code(401);
            return ["success" => false, "error"=> "Wrong credentials."];
        }
    }

    public static function logout($data = null)
    {
        if (isset($_COOKIE["UserID"]))
        {
            setcookie("UserID", "", time() - 3600, "/");
        }
        header("Location: /");

        return true;
    }
}

?>