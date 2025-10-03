<?php

namespace Kubrick\E164\Enum\FR\GEO\SO;

enum Location: int implements \Kubrick\E164\Interface\Location
{
    case UNKNOWN = 00;
    case SO_31 = 31;
    case SO_33 = 33;
    case SO_34 = 34;
    case SO_35 = 35;
    case SO_36 = 36;
    case SO_40 = 40;
    case SO_45 = 45;
    case SO_46 = 46;
    case SO_47 = 47;
    case SO_49 = 49;
    case SO_53 = 53;
    case SO_55 = 55;
    case SO_56 = 56;
    case SO_57 = 57;
    case SO_58 = 58;
    case SO_59 = 59;
    case SO_61 = 61;
    case SO_62 = 62;
    case SO_63 = 63;
    case SO_64 = 64;
    case SO_65 = 65;
    case SO_67 = 67;
    case SO_81 = 81;
    case SO_82 = 82;

    public function location(): string
    {
        return match($this) {
            self::SO_31, self::SO_62, self::SO_61 => 'Haute-Garonne',
            self::SO_33, self::SO_56, self::SO_57 => 'Gironde',
            self::SO_34 => 'Haute-Garonne/Ariège',
            self::SO_35 => 'Gironde/Dordogne',
            self::SO_36 => 'Creuse/Indre',
            self::SO_40, self::SO_58 => 'Landes',
            self::SO_45 => 'Charente',
            self::SO_46 => 'Charente-Maritime',
            self::SO_47 => 'Lot-et-Garonne',
            self::SO_49 => 'Deux-Sèvres/Vienne',
            self::SO_53 => 'Dordogne',
            self::SO_55 => 'Corrèze/Haute-Vienne',
            self::SO_59 => 'Pyrénées-Atlantiques',
            self::SO_63 => 'Tarn',
            self::SO_64 => 'Occitanie',
            self::SO_65 => 'Aveyron/Lot',
            self::SO_67 => 'Ariège/Haute-Garonne',
            self::SO_81, self::SO_82 => 'Tarn-et-Garonne/Tarn',
        };
    }

}
