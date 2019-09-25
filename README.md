PHP Debug functions
===================

badges to come

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
