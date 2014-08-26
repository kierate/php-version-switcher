# PHP location-specific version switcher.
# 
# Based on the current path the script checks if the base directory
# contains a file telling it to use a different php version. These files are:
# - php52 - for PHP 5.2
# - php53 - for PHP 5.3
# - php54 - for PHP 5.4
# - php55 - for PHP 5.5
# - php56 - for PHP 5.6
# 
# The base directory has to be adjusted, the example below works with the
# following paths:
# - /home/group1/www/project-a/
# - /home/group2/www/project-b/
# - /home/group3/www/project-c/
#
# If the phpXX file is not in the base directory or the current directory
# is not matched then the default PHP runs from /usr/bin/php.
#
# To speed up execution you can change the order of the if/else to suit your
# particular setup.
#
# This script should be placed on the include path before the actual php.

PHP_BIN=/usr/bin/php

CWD=$(pwd)

if [[ $CWD =~ (^/home/(group1|group2|group3)/www/([^/]*)) ]]; then
	CLIENT_BASE_PATH=${BASH_REMATCH[1]}
	
	if [ -f $CLIENT_BASE_PATH/php52 ]; then
		PHP_BIN=/usr/bin/php52/php
	elif [ -f $CLIENT_BASE_PATH/php53 ]; then
		PHP_BIN=/usr/bin/php53/php
	elif [ -f $CLIENT_BASE_PATH/php54 ]; then
		PHP_BIN=/usr/bin/php54/php
	elif [ -f $CLIENT_BASE_PATH/php55 ]; then
		PHP_BIN=/usr/bin/php55/php
	elif [ -f $CLIENT_BASE_PATH/php56 ]; then
		PHP_BIN=/usr/bin/php56/php
	fi
fi

$PHP_BIN "$@"