# IncludeAll

A small and simple class to automatically include whole the directories and subdirectories files in php. 
This should be used to bootstrap a group of the application dependencies that should loaded everytime in a script.

Simple using example:

```php
$includeAll = require ('include-all/index.php');
$includeAll->includeAll ('path/to/directory');
```

OR

```php
require ('include-all/index.php');

use Sammy\Packs\IncludeAll;

$includeAll = new IncludeAll ();

$includeAll->includeAll ('path/to/directory');
```