<?php
class Conf
{
    private static $databases = array(
        // Le nom d'hote est webinfo a l'IUT
        // ou localhost sur votre machine
        'hostname' => ' ',
        // A l'IUT, vous avez une BDD nommee comme votre login
        // Sur votre machine, vous devrez creer une BDD
        'database' => ' ',
        // A l'IUT, c'est votre login
        // Sur votre machine, vous avez surement un compte 'root'
        'login' => ' ',
        // A l'IUT, c'est votre mdp (INE par defaut)
        // Sur votre machine personelle, vous avez creez ce mdp a l'installation
        'password' => ' ',
        // Prefixe des tables
        'prefix' => 'cac_',
    );

    private static $debug = true;

    public static function getDebug()
    {
        return self::$debug;
    }

    public static function getLogin()
    {
        return self::$databases['login'];
    }

    public static function getHostname()
    {
        return self::$databases['hostname'];
    }

    public static function getDatabase()
    {
        return self::$databases['database'];
    }

    public static function getPassword()
    {
        return self::$databases['password'];
    }

    public static function getPrefix()
    {
        return self::$databases['prefix'];
    }

    public static function getBaseURL()
    {
        $currentPath = $_SERVER['PHP_SELF'];
        $pathInfo = pathinfo($currentPath);
        $hostName = $_SERVER['HTTP_HOST'];
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https://' ? 'https://' : 'http://';
        return $protocol . $hostName . $pathInfo['dirname'] . "/";
    }
}
