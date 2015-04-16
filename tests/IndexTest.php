<?php

class IndexTest extends PHPUnit_Framework_TestCase
{
    public function testIndexRedirects()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://localhost:8000');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);

        $response = curl_exec($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = trim(substr($response, 0, $header_size));

        $this->assertContains('Location: http://www.meetup.com/PHP-Berkshire/', $header);
    }
}
