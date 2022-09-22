<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 00:01 --> Query error: Unknown column 'usernamea' in 'field list' - Invalid query: SELECT `refkey`, `pkey`, `usernamea`
FROM `account`
ERROR - 00:02 --> Query error: Unknown column 'usernamea' in 'field list' - Invalid query: SELECT `refkey`, `pkey`, `usernamea`
FROM `account`
ERROR - 00:04 --> Query error: Unknown column 'usernamea' in 'field list' - Invalid query: SELECT `refkey`, `pkey`, `usernamea`
FROM `account`
WHERE `refkey` IN('34')
ERROR - 01:21 --> Severity: Notice --> Undefined index: pkey C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Refral.php 59
ERROR - 01:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '0) VALUES (37, 0)' at line 1 - Invalid query: INSERT INTO `range` (`refkey`, 0) VALUES (37, 0)
ERROR - 01:22 --> Severity: Notice --> Undefined index: pkey C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Refral.php 59
ERROR - 01:23 --> Severity: Notice --> Undefined index: pkey C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Refral.php 59
ERROR - 01:23 --> Severity: Notice --> Undefined index: pkey C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Refral.php 59
ERROR - 01:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'range = range+1
WHERE `refkey` IS NULL' at line 1 - Invalid query: UPDATE `range` SET range = range+1
WHERE `refkey` IS NULL
ERROR - 01:26 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'range = range+1
WHERE `refkey` = '5'' at line 1 - Invalid query: UPDATE `range` SET range = range+1
WHERE `refkey` = '5'
ERROR - 01:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'range = range +1
WHERE `refkey` = '5'' at line 1 - Invalid query: UPDATE `range` SET range = range +1
WHERE `refkey` = '5'
ERROR - 01:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'range = range +1
WHERE `refkey` = '5'' at line 1 - Invalid query: UPDATE `range` SET range = range +1
WHERE `refkey` = '5'
ERROR - 01:29 --> Severity: Notice --> Undefined offset: 0 C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Refral.php 22
ERROR - 03:06 --> Severity: Notice --> Undefined index: userkey C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Game.php 274
ERROR - 03:06 --> Severity: Notice --> Undefined index: userkey C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Game.php 274
ERROR - 03:06 --> Severity: Notice --> Undefined index: userkey C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Game.php 274
ERROR - 03:07 --> Severity: Notice --> Undefined index: refkey C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Game.php 274
ERROR - 12:04 --> 404 Page Not Found: Game/item
ERROR - 17:38 --> Severity: Notice --> Undefined index: refkey C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Game.php 312
ERROR - 17:38 --> Severity: Notice --> Undefined index: refkey C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Game.php 312
ERROR - 17:41 --> Severity: Notice --> Undefined index: refkey C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Game.php 313
ERROR - 20:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`!` > 1658062909
ORDER BY `range`.`count` desc
 LIMIT 10' at line 5 - Invalid query: SELECT `range`.*, `account`.`username` as `username`, `account`.`pkey` as `userkey`
FROM `range`
LEFT JOIN `account` ON `account`.`pkey`=`range`.`refkey`
WHERE `date` <= 1655470909
AND `date` `!` > 1658062909
ORDER BY `range`.`count` desc
 LIMIT 10
ERROR - 20:08 --> Query error: Table 'crypto_range.rangea' doesn't exist - Invalid query: SELECT `range`.*, `account`.`username` as `username`, `account`.`pkey` as `userkey`
FROM `rangea`
LEFT JOIN `account` ON `account`.`pkey`=`range`.`refkey`
WHERE `date` <= 1660741708
AND `date` > 1658063308
ORDER BY `range`.`count` desc
 LIMIT 10
ERROR - 20:25 --> Severity: Notice --> Array to string conversion C:\xampp_php7.3\htdocs\cryptoRange\application\views\public\range.php 16
ERROR - 20:27 --> Severity: Notice --> Array to string conversion C:\xampp_php7.3\htdocs\cryptoRange\application\views\public\range.php 30
ERROR - 20:27 --> Severity: Notice --> Array to string conversion C:\xampp_php7.3\htdocs\cryptoRange\application\views\public\range.php 44
ERROR - 22:49 --> Query error: Unknown column 'c' in 'field list' - Invalid query: UPDATE `account` SET `c` = 'r'
WHERE `pkey` = '47'
ERROR - 22:51 --> Query error: Unknown column 'c' in 'field list' - Invalid query: UPDATE `account` SET `c` = 'r'
WHERE `pkey` = '47'
ERROR - 22:52 --> Query error: Unknown column 'c' in 'field list' - Invalid query: UPDATE `account` SET `c` = 'r'
WHERE `pkey` = '47'
ERROR - 22:53 --> Severity: Notice --> Undefined offset: 0 C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Game.php 142
ERROR - 22:53 --> Severity: Notice --> Undefined offset: 0 C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Game.php 142
ERROR - 22:53 --> Severity: Notice --> Undefined offset: 0 C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Game.php 142
ERROR - 22:53 --> Severity: Notice --> Undefined offset: 0 C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Game.php 142
ERROR - 22:53 --> Severity: Notice --> Undefined offset: 0 C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Game.php 142
