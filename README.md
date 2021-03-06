# PHP SDK for Amazon's Selling Partner API

This is a work-in-progress implementation of Amazon's Selling Partner API in PHP. This package aims to provide an easy to use, fluent interface to the API. 

If you would like to participate in the development of this SDK, please get in touch with us at support@jasaratech.com

We also maintain an updated fork of the old Amazon MWS API: https://github.com/keithbrink/amazon-mws-laravel

# Installation

You can use Composer to install this package in your projects:

`composer require jasara/php-amzn-selling-partner-api`

# Usage

The best way to understand how to use this SDK is by reading the class for the specific call you would like to make. In general, you should expect a fluent interface, such as:

```php
use Jasara\AmazonSPA\Feeds;

$amazon = new Feeds($config);
$feed = $amazon->feedId($feed_id)->getFeed();
if($feed->failed) {
    $errors = $amazon->errors();
}
if($feed->completed) {
    $document = $feed->getFeedDocument();
}
```

## Config

When you instantiate the AmazonSPA class, the config paramater should be set as follows:

```php
[
    'marketplaceId' => 'ATVPDKIKX0DER',
    'accessToken' => '***', 
    'refreshToken' => '***', // If you would like the SDK to automatically fetch a new access token if necessary
    'clientId' => '***',
    'clientSecret' => '***',
    'accessKey' => '***', // Your AWS Access Key ID
    'secretKey' => '***', // Your AWS Secret Access Key
]
```

# License

This project is not licensed for commercial usage, but you are hereby granted the right to use this project for commercial purposes as long as your annual revenue is under $100,000 USD. Above that level, please email support@jasaratech.com to obtain a commercial license.

You are free to use the project for non-commercial purposes. 

## Why a Non Commercial License?

Judging by the current pace of development by the Amazon Selling Partner API team, it looks like they plan to develop at a rapid pace, so it will be an effort to keep up with all the changes. We would like this project to start with sustainability in mind, rather than have a project that only works properly for several months and then no longer receives updates.

If reducing costs is more important to you than development speed and time, you can always generate your own PHP SDK using the swagger-gen tools that the Selling Partner API team provides.