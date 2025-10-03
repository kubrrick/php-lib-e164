# PHP Lib E164 Library

![Static Badge](https://img.shields.io/badge/licence-WTFPL_2.0-brightred?style=flat)

This library allow you to create E164 numbers and interact with them

## 1. E164 number

Create a French phone number

``` php
use Kubrick\E164\Number\E164FRNumber;

include 'vendor/autoload.php';

$short = new E164FRNumber('388809568'); // 9 digit french number
$local = new E164FRNumber('0388809568'); // 10 digits
$int   = new E164FRNumber('0033388809568'); // international
$e164  = new E164FRNumber('+33388809568'); // E164

```

## 2. Factory

As we just created a French phone number we have to use a French factory to get next numbers

``` php
use Kubrick\E164\Factory\FranceNumberFactory;
use Kubrick\E164\Number\E164FRNumber;

$numbers = FranceNumberFactory::nextNumber(new E164FRNumber("533290001"), 4); Request the 4 next numbers
```

We also can retrieve missing numbers 

```php
$numbers[] = new E164FRNumber("350000001");
$numbers[] = new E164FRNumber("350000009");
$numbers[] = new E164FRNumber("350000002");

// Will create missings numbers between the lower and the higher given (given are excluded)
$newNumbers = FranceNumberFactory::missingNumbers($numbers, 5);
dd($newNumbers);
```