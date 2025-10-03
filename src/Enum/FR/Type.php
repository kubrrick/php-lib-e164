<?php

namespace Kubrick\E164\Enum\FR;

enum Type: int
{
    case UNKNOWN = 0;
    case NATIONAL = 1;
    case MOBILE = 2;
    case SPECIAL = 3;
    case VOIP = 4;
}
