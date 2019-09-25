PHP Debug functions
===================

[![codecov](https://codecov.io/gh/martinmdev/php-debug/branch/master/graph/badge.svg)](https://codecov.io/gh/martinmdev/php-debug)
[![Build Status](https://travis-ci.com/martinmdev/php-debug.svg?branch=master)](https://travis-ci.com/martinmdev/php-debug)
[![Latest Stable Version](https://poser.pugx.org/martinmdev/php-debug/v/stable)](https://packagist.org/packages/martinmdev/php-debug)
[![Total Downloads](https://poser.pugx.org/martinmdev/php-debug/downloads)](https://packagist.org/packages/martinmdev/php-debug)
[![Latest Unstable Version](https://poser.pugx.org/martinmdev/php-debug/v/unstable)](https://packagist.org/packages/martinmdev/php-debug)
[![License](https://poser.pugx.org/martinmdev/php-debug/license)](https://packagist.org/packages/martinmdev/php-debug)

Usage
-----

```php
<?php

require __DIR__ . '/../../vendor/autoload.php';

use Martinm\Debug\DebugHelper;

DebugHelper::create()->a('http://example.com/foo/bar');

// prints:
// <a href="http://example.com/foo/bar" target="_blank">http://example.com/foo/bar</a><br />


vd([
    'x' => 1,
]);

// prints:
//  array(1) {
//     'x' =>
//     int(1)
//   }

```

Installation
------------
```shell script
composer require martinmdev/php-debug
```
