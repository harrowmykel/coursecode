<?php 
    namespace Unirest\Request\Body\Test;

use Unirest\Request as URequest;
use Unirest\Request\Body as UBody;
    include 'php/unirest-php-master\unirest-php-master\src\unirest.php';
    // Upload
    function testUpload()
    {
        echo __DIR__ ;
        $fixture = __DIR__ . '/fixtures/upload.txt';
        if(file_exists($fixture)){
            echo "dlkjhfj";
        }

        $headers = array('Accept' => 'application/json');
        $files = array('file' => $fixture);
        $data = array('name' => 'ahmad');

        $body = URequest\Body::Multipart($data, $files);

        $response = URequest::post("http://localhost/coursecode/"."to.php", $headers, $body);
        var_dump($response->body);
        // assertEquals(200, $response->code);
        // assertEquals('POST', $response->body->method);
        // assertEquals('ahmad', $response->body->postData->params->name);
        // assertEquals('This is a test', $response->body->postData->params->file);
    }

    testUpload();

    ?>