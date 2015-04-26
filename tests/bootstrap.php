<?php

/*
 * This file is part of the PHP Berkshire website project.
 *
 * (c) PHP Berkshire <info@phpberks.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$command = 'php -S localhost:8000 -t ./web >/dev/null 2>&1 & echo $!';

$output = array();
exec($command, $output);

/**
 * Because the PHP server is starting up async, there's a race condition
 * ... so lets wait for it!
 */
sleep(1);

$pid = (int)$output[0];

register_shutdown_function(function() use ($pid) {
    exec('kill ' . $pid);
});
