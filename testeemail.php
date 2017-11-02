<?php
// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
// If you are using Composer (recommended)
require 'vendor/autoload.php';
// If you are not using Composer
// require("path/to/sendgrid-php/sendgrid-php.php");
$from = new SendGrid\Email("Narciso", "narcisocabral.jr@gmail.com");
$subject = "Sending with SendGrid is Fun";
$to = new SendGrid\Email("Example User", "narcisocabral.jr@gmail.com");
$content = new SendGrid\Content("text/plain", "and easy to do anywhere, even with PHP");
$mail = new SendGrid\Mail($from, $subject, $to, $content);
$apiKey = getenv('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');
$sg = new \SendGrid($apiKey);
$response = $sg->client->mail()->send()->post($mail);
echo $response->statusCode();
print_r($response->headers());
echo $response->body(); ?>