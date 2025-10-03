# PHP Lib E164 Library

![Static Badge](https://img.shields.io/badge/licence-WTFPL_2.0-brightred?style=flat)

This library allow you to create E164 numbers and interact with them

## 1. E164 number creation

Create a French phone number

``` php
use Kubrick\E164\Number\E164FRNumber;

include 'vendor/autoload.php';

$short = new E164FRNumber('388809568'); // 9 digit french number
$local = new E164FRNumber('0388809568'); // 10 digits
$int   = new E164FRNumber('0033388809568'); // international
$e164  = new E164FRNumber('+33388809568'); // E164

```

## 2. Create a factory

As we just created a French phone number we have to use a French factory to get next numbers

``` php
use Kubrick\E164\Factory\FranceNumberFactory;
use Kubrick\E164\Number\E164FRNumber;

$number = new E164FRNumber("367550001");

$numbers = FranceNumberFactory::nextNumber($e164, 4); Request the 4 next numbers

```