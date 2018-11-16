<?php

class Model
{
    public static $pdo;

    public function __construct($data){
      $class_name = 'Model' . ucfirst(static::$object);
      foreach($data as $key => $values){
        $this->$key = $values;
      }
    }

    public static function Init()
    {
        //Récupération des données nécéssaires à la connexion à la base de données.
        $hostname = Conf::gethostname();
        $database_name = Conf::getDatabase();
        $login = Conf::getLogin();
        $password = Conf::getPassword();

        try {
            //création du PDO.
            new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password);
        } catch (PDOException $e) {
            //affiche un message d'erreur.
            echo $e->getMessage();
            die();
        }

        //connexion à la base de données.
        self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        //On active le mode d'affichage des erreurs, et le lancement d'exception en cas d'erreurs.
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    //getter générique.
    public function get($nomAttribut)
    {
        $class_name = 'Model' . ucfirst(static::$object);
        return $class_name->$nomAttribut;
    }

    //setter générique.
    public function set($nomAttribut, $valeur)
    {
        $class_name = 'Model' . ucfirst(static::$object);
        $class_name->$nomAttribut = $valeur;
    }

    // fonction pour avoir un object suivant sa clef primaire
    public function select($primary_value)
    {
        $table_name = Conf::getPrefix() . static::$object;
        $class_name = 'Model' . ucfirst(static::$object);
        $primary_key = static::$primary;

        try {
            $sql = "SELECT* FROM $table_name WHERE $primary_key = :id_tag";
            $rep_prep = Model::$PDO->prepare($sql);
            $values = array('id_tag' => $primary_key);
            $rep_prep->execute($values);
            $rep_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
            $tab = $rep_prep->fetchAll();
            if (empty($tab)) {
                return false;
            } else {
                return $tab[0];
            }
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php"> retour a la page d\'accueil </a>';
            }
        }
    }

    // Selectionne tout les objet du type courrant
    public function selectAll()
    {
        $table_name = Conf::getPrefix() . static::$object;
        $class_name = 'Model' . ucfirst(static::$object);

        try {
            $rep = Model::$PDO->query("SELECT* FROM $table_name");
            $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
            $tab = $rep->fetchAll();
            return $tab;
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php"> retour a la page d\'accueil </a>';
            }
        }
    }

    // Met à jour un objet
    public function update($data)
    {
        $table_name = Conf::getPrefix() . static::$object;
        $primary_key = static::$primary;

        try {
            $sql = "UPDATE $table_name SET ";
            $sets = array();

            foreach ($data as $key => $values) {
                if ($key != $primary_key) {
                    $sets[] = $key . ' = :' . $key;
                }
            }

            $sql .= implode(', ', $sets) . ' WHERE ' . $primary_key . ' = :' . $primary_key;
            $rep_prep = Model::$PDO->prepare($sql);
            $rep_prep->execute($data);

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php"> retour a la page d\'accueil </a>';
            }
        }
    }

    // Efface un objet par sa clef primaire
    public function delete($primary_value)
    {
        $table_name = Conf::getPrefix() . static::$object;
        $primary_key = static::$primary;

        try {
            $sql = "DELETE FROM $table_name WHERE $primary_key = :id_tag";
            $rep_prep = Model::$PDO->prepare($sql);
            $values = array('id_tag' => $primary_key);
            $rep_prep->execute($values);
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php"> retour a la page d\'accueil </a>';
            }
        }
    }

    // Sauvegarde un object
    public function save()
    {
        try {
            $table_name = static::$object;
            $class_name = 'Model' . ucfirst(static::$object);
            $primary_key = static::$primary;

            $setstring = "";
            $valuesstring = "";

            $reflection = new ReflectionClass($this);
            $reflect = $reflection->getProperties(ReflectionProperty::IS_PRIVATE);

            foreach ($reflect as $values1) {
                foreach ($values1 as $values2) {
                    if ($values2 != $class_name) {
                        $attr[] = $values2;
                    }
                }
            }

            foreach ($attr as $key => $values) {
                $setstring .= $values . ', ';
                $valuesstring .= ':' . $values . ', ';
            }

            $setstring = rtrim($setstring, ', ');
            $valuesstring = rtrim($valuesstring, ', ');

            $sql = 'INSERT INTO ' . $table_name . '(' . $setstring . ') VALUES (' . $valuesstring . ')';
            $req_prep = Model::$pdo->prepare($sql);

            foreach ($attr as $key => $values3) {
                $vals[$values3] = $this->get($values3);
            }

            $req_prep->execute($vals);
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php"> retour a la page d\'accueil </a>';
            }
            die();
        }
    }
}

//initialisation du Model.
Model::Init();
