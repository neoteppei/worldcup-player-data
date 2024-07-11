<?php
$dir = __DIR__ . '/storage';
chmod($dir, 0775);
chown($dir, 'www-data');