<?php

namespace Kubrick\E164\Enum\FR\GEO\NO;

enum Location: int implements \Kubrick\E164\Interface\Location
{
    case UNKNOWN = 00;
    case NO_31 = 31;
    case NO_32 = 32;
    case NO_33 = 33;
    case NO_35 = 35;
    case NO_37 = 37;
    case NO_38 = 38;
    case NO_40 = 40;
    case NO_41 = 41;
    case NO_43 = 43;
    case NO_44 = 44;
    case NO_47 = 47;
    case NO_48 = 48;
    case NO_51 = 51;
    case NO_52 = 52;
    case NO_53 = 53;
    case NO_54 = 54;
    case NO_56 = 56;
    case NO_57 = 57;
    case NO_98 = 98;
    case NO_99 = 99;

    public function location(): string
    {
        return match ($this) {
            self::UNKNOWN => 'UNKNOWN',
            self::NO_31 => 'Calvados',
            self::NO_32 => 'Eure',
            self::NO_33 => 'Manche',
            self::NO_35 => 'Seine-Maritime',
            self::NO_37 => 'Eure-et-Loir',
            self::NO_38 => 'Loiret',
            self::NO_40, self::NO_44 => 'Loire-Atlantique',
            self::NO_41 => 'Maine-et-Loire',
            self::NO_43 => 'Mayenne/Sarthe',
            self::NO_47 => 'Indre-et-Loire',
            self::NO_48 => 'Cher',
            self::NO_51 => 'Vendée',
            self::NO_52 => '52',
            self::NO_53 => 'Loire-Atlantique/Vendée',
            self::NO_54 => 'Indre/Loir-et-Cher',
            self::NO_56 => 'Morbihan',
            self::NO_57 => 'Bretagne',
            self::NO_98 => 'Finistère',
            self::NO_99 => 'Ille-et-Vilaine',
        };
    }
}
