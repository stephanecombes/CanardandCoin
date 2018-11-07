<?php
class Conf
{

    private static $databases = array(
        // Le nom d'hote est webinfo a l'IUT
        // ou localhost sur votre machine
        'hostname' => 'localhost',
        // A l'IUT, vous avez une BDD nommee comme votre login
        // Sur votre machine, vous devrez creer une BDD
        'database' => 'combess',
        // A l'IUT, c'est votre login
        // Sur votre machine, vous avez surement un compte 'root'
        'login' => 'root',
        // A l'IUT, c'est votre mdp (INE par defaut)
        // Sur votre machine personelle, vous avez creez ce mdp a l'installation
        'password' => '',
    );

    private static $debug = true;

    public static function getDebug()
    {
        return self::$debug;
    }

    public static function getLogin()
    {
        //en PHP l'indice d'un tableau n'est pas forcement un chiffre.
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

}
