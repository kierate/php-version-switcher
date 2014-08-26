PHP location-specific version switcher
====================

Based on the current path the script checks if the base directory contains a file telling it to use a different php version. These files are:
- php52 - for PHP 5.2 from /usr/bin/php52/php
- php53 - for PHP 5.3 from /usr/bin/php53/php
- php54 - for PHP 5.4 from /usr/bin/php54/php
- php55 - for PHP 5.5 from /usr/bin/php55/php
- php56 - for PHP 5.6 from /usr/bin/php56/php
 
Installation
-------------

This script should be placed on the include path before the actual php.


Configuration
--------------

The base directory has to be adjusted, the example in the code works with the following paths:
- /home/group1/www/project-a/
- /home/group2/www/project-b/
- /home/group3/www/project-c/

If the phpXX file is not in the base directory or the current directory is not matched then the default PHP runs from /usr/bin/php.

The paths to the actual versions on PHP that you have installed will also probably be different.

Usage
-----

Just call `php`. This will execute different versions of PHP depending where you are.

For example if you created `/home/group2/www/project-b/php54` then running `php` inside any sub directory of `/home/group2/www/project-b` will execute `/usr/bin/php54/php` (as that is the path to the 5.4 executable defined in this script).
