<?php

namespace Kubrick\E164\Enum\FR\GEO\NE;

enum Location: int implements \Kubrick\E164\Interface\Location
{
    case UNKNOWN = 00;
    case NE_20 = 20;
    case NE_21 = 21;
    case NE_22 = 22;
    case NE_23 = 23;
    case NE_24 = 24;
    case NE_25 = 25;
    case NE_26 = 26;
    case NE_27 = 27;
    case NE_28 = 28;
    case NE_29 = 29;
    case NE_30 = 30;
    case NE_31 = 31;
    case NE_32 = 32;
    case NE_33 = 33;
    case NE_38 = 38;
    case NE_80 = 80;
    case NE_81 = 81;
    case NE_84 = 84;
    case NE_85 = 85;
    case NE_87 = 87;
    case NE_88 = 88;
    case NE_89 = 89;
    case NE_90 = 90;

    public function location(): string
    {
        return match ($this) {
            self::UNKNOWN => 'UNKNOWN',
            self::NE_20, self::NE_27, self::NE_28 => 'Nord',
            self::NE_21 => 'Pas-de-Calais',
            self::NE_22 => 'Somme',
            self::NE_23 => 'Aisne',
            self::NE_24 => 'Ardennes',
            self::NE_25 => 'Aube',
            self::NE_26 => 'Marne',
            self::NE_29 => 'Vosges',
            self::NE_30 => 'Grand Est',
            self::NE_31 => 'Grand Est',
            self::NE_32 => 'Haute-Marne/Meuse',
            self::NE_33 => 'Meurthe-et-Moselle',
            self::NE_38 => 'Alsace',
            self::NE_80, self::NE_85 => 'Côte-d’Or/Saône-et-Loire',
            self::NE_81 => 'Doubs',
            self::NE_84 => 'Jura/Haute-Saône',
            self::NE_87 => 'Moselle',
            self::NE_88 => 'Bas-Rhin',
            self::NE_89 => 'Haut-Rhin',
            self::NE_90 => 'Bas-Rhin',
        };
    }
}
