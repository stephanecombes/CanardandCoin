<?php
class Security
{
    private static $seed = 'iZ5nMtJzkGzFUN1bnCG1';

    public static function chiffrer($texte_en_clair)
    {
        $texte_en_clair = self::$seed . $texte_en_clair;
        $texte_chiffre = hash('sha256', $texte_en_clair);
        return $texte_chiffre;
    }

    public static function getSeed()
    {
        return self::$seed;
    }
}
