<?php
require 'vendor/autoload.php';
use Mailgun\Mailgun;

$mg = Mailgun::create('YOUR_MAILGUN_API_KEY');
$result = $mg->messages()->send('sandboxd271fa72e6754103a4f40605a6a3c982.mailgun.org', [
    'from' => 'noreply@example.com',
    'to' => 'recipient@example.com',
    'subject' => 'Subject',
    'html' => 'Email body',
]);

if ($result->http_response_code == 200) {
    echo "Email sent successfully!";
} else {
    echo "Error: {$result->http_response_body->message}";
}
