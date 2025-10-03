<?php

namespace Kubrick\E164\Enum\FR\GEO\SE;

enum Location: int implements \Kubrick\E164\Interface\Location
{
    case UNKNOWN = 00;
    case SE_26 = 26;
    case SE_27 = 27;
    case SE_28 = 28;
    case SE_30 = 30;
    case SE_32 = 32;
    case SE_34 = 34;
    case SE_37 = 37;
    case SE_38 = 38;
    case SE_50 = 50;
    case SE_51 = 51;
    case SE_66 = 66;
    case SE_67 = 67;
    case SE_68 = 68;
    case SE_69 = 69;
    case SE_70 = 70;
    case SE_71 = 71;
    case SE_72 = 72;
    case SE_73 = 73;
    case SE_74 = 74;
    case SE_75 = 75;
    case SE_76 = 76;
    case SE_77 = 77;
    case SE_78 = 78;
    case SE_79 = 79;
    case SE_80 = 80;
    case SE_82 = 82;
    case SE_83 = 83;
    case SE_91 = 91;
    case SE_92 = 92;
    case SE_94 = 94;
    case SE_95 = 95;
    case SE_96 = 96;

    public function location(): string
    {
        return match ($this) {
            self::UNKNOWN => 'UNKNOWN',
            self::SE_26 => 'Rhône-Alpes',
            self::SE_27 => 'Loire/Rhône',
            self::SE_28, self::SE_75 => 'Drôme/Ardèche',
            self::SE_30 => 'Gard/Hérault',
            self::SE_32 => 'Vaucluse',
            self::SE_34, self::SE_67 => 'Hérault',
            self::SE_37, self::SE_72, self::SE_78, self::SE_69 => 'Rhône',
            self::SE_38, self::SE_76 => 'Isère',
            self::SE_50 => 'Haute-Savoie',
            self::SE_51 => 'Auvergne',
            self::SE_66 => 'Gard/Lozère',
            self::SE_68 => 'Aude/Pyrénées-Orientales',
            self::SE_70 => 'Allier',
            self::SE_71 => 'Haute-Loire/Cantal',
            self::SE_73 => 'Puy-de-Dôme',
            self::SE_74 => 'Ain/Rhône ',
            self::SE_77 => 'Loire',
            self::SE_79 => 'Savoie',
            self::SE_80 => 'Savoie/Haute-Savoie',
            self::SE_82 => 'PACA',
            self::SE_83, self::SE_94 => 'Var',
            self::SE_91, self::SE_96 => 'Bouches-du-Rhône',
            self::SE_92 => 'Alpes-de-Haute-Provence/Hautes-Alpes/Alpes-Maritimes',
            self::SE_95 => 'Corse',
        };
    }
}
