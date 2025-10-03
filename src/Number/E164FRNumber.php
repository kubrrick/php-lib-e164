<?php

namespace Kubrick\E164\Number;

use Kubrick\E164\E164Number;
use Kubrick\E164\Enum\Country;
use Kubrick\E164\Enum\FR\State;
use Kubrick\E164\Enum\FR\Type;
use Kubrick\E164\Exception\NotValidNumberException;
use Kubrick\E164\Interface\Location;

class E164FRNumber extends E164Number
{
    public readonly State $state;
    public readonly Location $location;

    /**
     * @throws NotValidNumberException
     */
    public function __construct(string $number)
    {
        $number = str_replace(' ', '', $number);
        preg_match('#^(0033|\+33|0)?[1-9]\d{8}$#', $number) ?: throw new NotValidNumberException($number. ' Is not a valid French Number');
        $this->country = Country::FRANCE;
        $this->number = '+' . $this->country->value . substr($number, -9);


        switch (substr($this->number, 3, 1)) {
            case 2:
            case 3:
            case 4:
            case 5:
            case 1:
                $this->type = Type::NATIONAL;
                break;
            case 7:
            case 6:
                $this->type = Type::MOBILE;
                break;
            case 8:
                $this->type = Type::SPECIAL;
                break;
            case 9:
                $this->type = Type::VOIP;
                break;
            default:
                $this->type = Type::UNKNOWN;
                break;
        }

        if ($this->type == Type::NATIONAL) {
            $this->state = State::from((int) substr($this->number, 3, 1));

            switch ($this->state) {
                case State::IDF:
                    try {
                        $this->location = \Kubrick\E164\Enum\FR\GEO\IDF\Location::from((int) substr($this->number, 4, 2));
                    } catch (\ValueError) {
                        $this->location = \Kubrick\E164\Enum\FR\GEO\IDF\Location::UNKNOWN;
                    }
                    break;
                case State::NORD_OUEST:
                    try {
                        $this->location = \Kubrick\E164\Enum\FR\GEO\NO\Location::from((int) substr($this->number, 4, 2));
                    } catch (\ValueError) {
                        $this->location = \Kubrick\E164\Enum\FR\GEO\NO\Location::UNKNOWN;
                    }
                    break;
                case State::NORD_EST:
                    try {
                        $this->location = \Kubrick\E164\Enum\FR\GEO\NE\Location::from((int) substr($this->number, 4, 2));
                    } catch (\ValueError) {
                        $this->location = \Kubrick\E164\Enum\FR\GEO\NE\Location::UNKNOWN;
                    }
                    break;
                case State::SUD_EST:
                    try {
                        $this->location = \Kubrick\E164\Enum\FR\GEO\SE\Location::from((int) substr($this->number, 4, 2));
                    } catch (\ValueError) {
                        $this->location = \Kubrick\E164\Enum\FR\GEO\SE\Location::UNKNOWN;
                    }
                    break;
                case State::SUD_OUEST:
                    try {
                        $this->location = \Kubrick\E164\Enum\FR\GEO\SO\Location::from((int) substr($this->number, 4, 2));
                    } catch (\ValueError) {
                        $this->location = \Kubrick\E164\Enum\FR\GEO\SO\Location::UNKNOWN;
                    }
                    break;
            }

        }


    }

    public function toShort(): string
    {
        return substr($this->number, -9);
    }

    public function toLocal(): string
    {
        return '0' . substr($this->number, -9);
    }

    public function toInternational(): string
    {
        return '00' . $this->country->value . substr($this->number, -9);
    }

    public function toE164(): string
    {
        return $this->number;
    }

    public function toPresentable(): string
    {
        return implode(' ', str_split($this->toLocal(), 2));
    }
}
