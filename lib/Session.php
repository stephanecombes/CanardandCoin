<?php
class Session
{
    public static function is_user($login)
    {
        return (!empty($_SESSION['idUtilisateur']) && ($_SESSION['idUtilisateur'] == $login));
    }
}
