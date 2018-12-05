<?php
class Session
{
    public static function is_user($login)
    {
        return (!empty($_SESSION['idUtilisateur']) && ($_SESSION['idUtilisateur'] == $login));
    }

    public static function is_admin()
    {
        return (isset($_SESSION['idRole']) && (strcmp($_SESSION['idRole'], '0') == 0));
    }
}
