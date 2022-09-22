# IncludeAll

A small and simple class to automatically include whole the directories and subdirectories files in php using retalive or absolutes paths.

This should be used to bootstrap a group of the application dependencies that should be loaded everytime in a script.

Just a great way for avoiding to use the include or require serveral times when trying to load a big number of files inside a directory.

## THE OLD WAY FOR INCLUDING FILES

```php
include 'myDirectory/someFile.php';
include 'myDirectory/otherFile.php';
include 'myDirectory/anotherFile.php';
include 'myDirectory/yetAnotherFile.php';
``` 

## THE NEW WAY USING 'INCLUDE-ALL'

You can use the include-all library with and without composer.
If not using composer the library brigns an autoload file wich should be encountered inside the directory it is located. 
The `include-all autoload file` should be required such as the `vendor/autoload.php` is... Before trying to use the library. 

### Without using composer autoload

```php
use Sammy\Packs\IncludeAll;

require_once 'path/to/include-all/autoload';

$includeAll = new IncludeAll;

# Using the dot slash (./) at the beggining
# of the path is assuming that myDirectory is 
# located in the same directory[ or path] the 
# php script is. 
$includeAll->includeAll('./myDirectory');
```

### Using composer autoload

```php
use Sammy\Packs\IncludeAll;

# Assuming that the vendor directory is 
# located in the same where the current
# script is.
require_once __DIR__ . '/vendor/autoload';

$includeAll = new IncludeAll;

# Using the dot slash (./) at the beggining
# of the path is assuming that myDirectory is 
# located in the same directory[ or path] the 
# php script is. 
$includeAll->includeAll('./myDirectory');
```

## HOW TO INSTALL

It is possible to get the source code from github following the url shown bellow:
[php-module/include-all](https://github.com/php-module/include-all)

### If using composer:

```bash
composer require php_modules/core php_modules/include-all
```

Adding it as a requirement inside the `composer.json` file:

```json
{
  "require": {
    "php_modules/include-all": "^1.0.5"
  }
}
```

## Simple using example:

```php
$includeAll = require ('path/to/include-all/index.php');
$includeAll->includeAll ('./path/to/directory');
```

### Using the constructor directly

```php
require ('path/to/include-all/index.php');

use Sammy\Packs\IncludeAll;

$includeAll = new IncludeAll ();

$includeAll->includeAll ('./path/to/directory');
```
