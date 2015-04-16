<?php

$command = 'php -S localhost:8000 -t ./web >/dev/null 2>&1 & echo $!';

$output = array();
exec($command, $output);
$pid = (int)$output[0];

register_shutdown_function(function() use ($pid) {
    exec('kill ' . $pid);
});
