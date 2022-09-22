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
