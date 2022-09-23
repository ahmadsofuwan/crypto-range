<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 01:24 --> Severity: Notice --> Array to string conversion C:\xampp_php7.3\htdocs\cryptoRange\application\views\public\crypto.php 13
ERROR - 01:35 --> Severity: Notice --> Undefined variable: updateCrypto C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Game.php 345
ERROR - 01:35 --> Severity: Notice --> Undefined variable: updateCrypto C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Game.php 345
ERROR - 01:55 --> Query error: Table 'crypto_range.logs_farming' doesn't exist - Invalid query: SELECT `logs_farming`.*, `account`.`username` as `username`
FROM `logs_farming`
LEFT JOIN `account` ON `account`.`pkey`=`logs_farming`.`targetkey`
WHERE `logs_farming`.`refkey` = '41'
ORDER BY `logs_farming`.`time` desc
ERROR - 02:00 --> Severity: Notice --> Undefined index: note C:\xampp_php7.3\htdocs\cryptoRange\application\views\public\crypto.php 61
ERROR - 02:00 --> Severity: Notice --> Undefined index: value C:\xampp_php7.3\htdocs\cryptoRange\application\views\public\crypto.php 64
ERROR - 02:01 --> Severity: Notice --> Undefined index: value C:\xampp_php7.3\htdocs\cryptoRange\application\views\public\crypto.php 64
ERROR - 02:10 --> Severity: Notice --> Undefined index: transactionkey C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Admin.php 355
ERROR - 02:10 --> Query error: Table 'crypto_range.logs_farming' doesn't exist - Invalid query: UPDATE `logs_farming` SET `note` = 'success widraw'
WHERE `pkey` IS NULL
ERROR - 02:10 --> Severity: Notice --> Undefined index: transactionkey C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Admin.php 362
ERROR - 02:10 --> Query error: Table 'crypto_range.logs_farming' doesn't exist - Invalid query: UPDATE `logs_farming` SET `note` = 'Widraw Filed'
WHERE `pkey` IS NULL
ERROR - 02:12 --> Severity: Notice --> Undefined index: transactionkey C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Admin.php 362
ERROR - 02:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '0, 1, 2, 3, 4, 5, 6, 7, 8, 9) VALUES ('targetkey', '41', 'refkey', '41', 'time',' at line 1 - Invalid query: INSERT INTO `logs` (0, 1, 2, 3, 4, 5, 6, 7, 8, 9) VALUES ('targetkey', '41', 'refkey', '41', 'time', 1663874484, 'note', 'widraw Filed', 'value', '0')
ERROR - 02:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '0, 1, 2, 3, 4, 5, 6, 7, 8, 9) VALUES ('targetkey', '41', 'refkey', '41', 'time',' at line 1 - Invalid query: INSERT INTO `logs` (0, 1, 2, 3, 4, 5, 6, 7, 8, 9) VALUES ('targetkey', '41', 'refkey', '41', 'time', 1663874590, 'note', 'widraw Filed', 'value', '0')
ERROR - 02:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '0, 1) VALUES ('value', '0')' at line 1 - Invalid query: INSERT INTO `logs` (0, 1) VALUES ('value', '0')
ERROR - 02:24 --> Severity: Notice --> Undefined index: widraw C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Admin.php 367
ERROR - 04:38 --> Severity: Notice --> Undefined offset: 1 C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Game.php 43
ERROR - 04:41 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Game.php 45
ERROR - 23:17 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp_php7.3\htdocs\cryptoRange\application\controllers\Game.php 45
