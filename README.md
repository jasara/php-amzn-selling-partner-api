[![CI](https://github.com/jasara/php-amzn-selling-partner-api/actions/workflows/ci.yml/badge.svg)](https://github.com/jasara/php-amzn-selling-partner-api/actions/workflows/ci.yml)
[![Code coverage](https://raw.githubusercontent.com/jasara/php-amzn-selling-partner-api/main/.github/coverage.svg)](https://github.com/jasara/php-amzn-selling-partner-api)

# PHP SDK for Amazon's Selling Partner API

This is a work-in-progress implementation of Amazon's Selling Partner API in PHP. This package aims to provide an easy to use, fluent interface to the API. 

If you would like to participate in the development of this SDK, please get in touch with us at support@jasaratech.com

We also maintain an updated fork of the old Amazon MWS API for Laravel: https://github.com/keithbrink/amazon-mws-laravel

# Documentation

This README provides some basic details about the package; detailed documentation is available at: https://phpspa.com/docs/getting-started/

# Installation

You can use Composer to install this package in your projects:

`composer require jasara/php-amzn-selling-partner-api`

# Usage

The best way to understand how to use this SDK is by reading the documentation for the specific call you would like to make. In general, you should expect a fluent interface, such as:

```php
use Jasara\AmazonSPA\AmznSPA;

$amazon = new AmznSPA($config);
$response = $amzn->feeds->getFeed($feed_id);
if($response->errors) {
    return $response->errors; // ErrorListSchema
}

if($response->feed) {
    $document = $amazon->feeds->getFeedDocument($feed->result_feed_document_id);
}
```

## Config

When you instantiate the AmazonSPA class, the config is an object that should be initialized and then passed in:

```php
use Jasara\AmznSPA\AmznSPAConfig;

$config = new AmznSPAConfig(
    marketplace_id: 'ATVPDKIKX0DER',
    application_id: '***',
    lwa_access_token: '***',
    lwa_refresh_token: '***', // If you would like the SDK to automatically fetch a new access token if necessary
    lwa_client_id: '***',
    lwa_client_secret: '***',
    aws_access_key: '***',
    aws_secret_key: '***',
    assumed_role_arn: 'arn', // If you would like to authenticate using an assumed role
);
```

# License

This project is not licensed for commercial usage, but you are hereby granted the right to use this project for commercial purposes as long as your annual revenue is under $100,000 USD. 

Above that level, please [visit our Sponsors page](https://github.com/sponsors/jasara) to obtain an automatic commercial license.

You are free to use the project for non-commercial purposes. 

## Why a Non Commercial License?

Judging by the current pace of development by the Amazon Selling Partner API team, it looks like they plan to develop at a rapid pace, so it will be an effort to keep up with all the changes. We would like this project to start with sustainability in mind, rather than have a project that only works properly for several months and then no longer receives updates.

If reducing costs is more important to you than development speed and sustainability, you can always generate your own PHP SDK using the swagger-gen tools that the Selling Partner API team provides.