<?php

namespace Kubrick\E164;

use Kubrick\E164\Enum\Country;
use Kubrick\E164\Enum\FR\Type;

abstract class E164Number implements E164Interface
{
    public readonly string $number;
    public readonly Country $country;
    public readonly Type $type;

    public function __tostring(): string
    {
        return $this->number;
    }
}
