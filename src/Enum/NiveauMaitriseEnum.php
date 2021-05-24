<?php

namespace App\Enum;

abstract class NiveauMaitriseEnum
{
    const DEBUTANT      = "Débutant";
    const INTERMEDIAIRE = "Intermédiaire";
    const CONFIRME      = "Confirmé";

    protected static $typeName = [
        1 => 'Débutant',
        2 => 'Intermédiaire',
        3 => 'Confirmé'
    ];

    public static function getName($id)
    {
        if (!isset(static::$typeName[$id]))
        {
            return "Unknown type";
        }

        return static::$typeName[$id];
    }

    public static function getAvailableTypes()
    {
        return [
            self::DEBUTANT,
            self::INTERMEDIAIRE,
            self::CONFIRME
        ];
    }
}