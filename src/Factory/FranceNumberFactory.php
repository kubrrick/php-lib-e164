<?php

namespace Kubrick\E164\Factory;

use Kubrick\E164\Exception\NotValidNumberException;
use Kubrick\E164\Exception\OutOfBoundException;
use Kubrick\E164\Exception\TooFewNumberException;
use Kubrick\E164\Exception\WrongPrefixException;
use Kubrick\E164\Number\E164FRNumber;

abstract class FranceNumberFactory
{
    /**
     * @param E164FRNumber $number Number
     * @param int $nb Number of numbers requested
     * @param int $prefixLength the length of the prefix
     * @param bool $ex Throw Exception if out of bound
     * @return E164FRNumber[]
     * @throws NotValidNumberException
     * @throws OutOfBoundException
     */
    public static function nextNumber(E164FRNumber $number, int $nb = 1, int $prefixLength = 1, bool $ex = true): array
    {

        $numberLength = 9 - $prefixLength;
        $prefixPart = (int) substr($number->toShort(), 0, $prefixLength);
        $numberPart = (int) substr($number->toShort(), -$numberLength);

        $data = array();
        for ($i = 0; $i < $nb; $i++) {

            $numberPart++;
            $numberPartStr = (string) $numberPart;

            $diff = $numberLength - strlen($numberPartStr);

            if ($diff == -1) {
                if ($ex) {
                    throw new OutOfBoundException('Out of Bound');
                } else {
                    continue;
                }
            }

            if ($diff != 0) {
                $numberPartStr = str_pad($numberPartStr, $numberLength, '0', STR_PAD_LEFT);
            }

            $data[] = new E164FRNumber('+33' . $prefixPart . $numberPartStr);
        }
        return $data;
    }

    /**
     * @param E164FRNumber[] $e164Numbers
     * @param int $prefixLength
     * @return E164FRNumber[]
     * @throws WrongPrefixException
     * @throws TooFewNumberException
     * @throws NotValidNumberException
     * @throws OutOfBoundException
     */
    public static function missingNumbers(array $e164Numbers, int $prefixLength = 1): array
    {

        if (count($e164Numbers) < 2) {
            throw new TooFewNumberException("Array must contain at least 2 numbers and actually contain " . count($e164Numbers));
        }

        // We assume the first number is in charge of prefix
        $prefixPart = substr($e164Numbers[0]->toShort(), 0, $prefixLength);

        foreach ($e164Numbers as $e164Number) {
            if (!str_starts_with($e164Number->toShort(), $prefixPart)) {
                throw new WrongPrefixException('Number is ' . $e164Number->toShort() . ' but should start with: ' . $prefixPart);
            }
            $intNumbers[] = (int) $e164Number->toShort();
        }

        sort($intNumbers);
        $nbMissing = end($intNumbers) - reset($intNumbers);

        // We request all numbers between the fist and the last
        $e164Requested = self::nextNumber(new E164FRNumber($intNumbers[0]), $nbMissing, $prefixLength, false);

        // Check each number if it's a
        $e164MissingNumbers = array();
        foreach ($e164Requested as $requested) {
            if (in_array((int) $requested->toShort(), $intNumbers)) {
                continue;
            }
            $e164MissingNumbers[] = $requested;
        }

        return $e164MissingNumbers;
    }

}
