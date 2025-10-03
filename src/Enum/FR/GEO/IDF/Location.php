<?php

namespace Kubrick\E164\Enum\FR\GEO\IDF;

enum Location: int implements \Kubrick\E164\Interface\Location
{
    case UNKNOWN = 00;
    case IDF_30 = 30;
    case IDF_34 = 34;
    case IDF_39 = 39;
    case IDF_40 = 40;
    case IDF_41 = 41;
    case IDF_42 = 42;
    case IDF_43 = 43;
    case IDF_44 = 44;
    case IDF_45 = 45;
    case IDF_46 = 46;
    case IRD_47 = 47;
    case IDF_48 = 48;
    case IDF_49 = 49;
    case IDF_60 = 60;
    case IDF_64 = 64;
    case IDF_69 = 69;


    public function location(): string
    {
        return match ($this) {
            self::UNKNOWN => 'UNKNOWN',
            self::IDF_30, self::IDF_39 => 'Yvelines',
            self::IDF_34 => 'Val-d’Oise',
            self::IDF_40, self::IDF_41, self::IDF_42, self::IDF_43, self::IDF_44, self::IDF_45, self::IDF_46, self::IRD_47, self::IDF_48, self::IDF_49 => 'Paris',
            self::IDF_60, self::IDF_64 => 'Seine-et-Marne',
            self::IDF_69 => 'Essonne',
        };
    }
}
