# A PHP package to easily determine the possible hash algorithm(s) for a given string

This package is largely based off the excellent Python project [hashID](https://github.com/psypanda/hashID) which is included in Kali Linux by default.

This package supports over 220 hashing algorithms and can also include the corresponding hashcat mode and JohnTheRipper format.

## Requirements

PHP 7 or higher.

## Installation

You can install the package via composer:

```
composer require "brentkozjak/hash-identify":"~1.0.0"
```

## Usage

The `parse()` method will build an array of `BrentKozjak\HashIdentify\HashMode` objects.  The `HashMode` object extends `Jenssegers\Model\Model` which provides many nice to have features such as `toArray()` and `toJson()`.

Example usage:

```php
$string = 'b3b24027c676f8d2cdfa5e2ea8bc1cc7';

$hashTypes = new BrentKozjak\HashIdentify\HashIdentify();
$hashTypes->parse($string);

// Accessed by the object property
$hashTypes->modes

// Casting methods
$hashTypes->toArray();
$hashTypes->toJson();
```

## Todo

Tests!

## License

This project is open-sourced software licensed under the [GNU GENERAL PUBLIC LICENSE](https://www.gnu.org/licenses/gpl-3.0.en.html)
