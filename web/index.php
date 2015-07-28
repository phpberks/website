<?php

/*
 * This file is part of the PHP Berkshire website project.
 *
 * (c) PHP Berkshire <info@phpberks.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once('../vendor/autoload.php');

$app = new \Slim\Slim();

$app->get('/', function() use ($app) {
    $app->redirect('http://www.meetup.com/PHP-Berkshire/', 302);
});

$app->run();
