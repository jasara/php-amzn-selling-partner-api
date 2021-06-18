---
title: Authorizing Seller Accounts 
description: Learn how to authorize your application with your client seller accounts.
extends: _layouts.documentation
section: content
---
# Authorizing a Seller Account

Amazon SPA has two ways of authorizing your application for a Seller account. The simplest way is self-authorization, which you can use if your application will only interact with your own Seller acount. The second way is an OAuth workflow, where the Seller clicks a link (either from the Amazon Appstore or from your own website) to initiate an authorization.

## Self Authorization

Follow the [instructions from Amazon](https://github.com/amzn/selling-partner-api-docs/blob/main/guides/en-US/developer-guide/SellingPartnerApiDeveloperGuide.md#self-authorization) to generate an LWA refresh token.

When you make a request to the SPA, the library will use the refresh token to generate an access token. The access token will be returned along with the returned data so you can cache the access token to use in requests for the next hour. Once that token expires, a new one will be generated as long as you continue to pass the refresh token in the config data.

### Example - Only Passing a Refresh Token
```php
use Jasara\AmznSPA;

$config = [
    // ...
    'lwa_refresh_token' => 'Atza|IQEBLjAsAhRmHjNgHpi0U-Dme37rR6CuUpSREXAMPLE',
];

$spa = new AmznSPA($config);
$items = $spa->getCatalogItems();

$lwa_access_token = $spa->getAccessToken(); // Get the latest access token.
```

All of the signing and authentiation headers will be added automatically to your request.

## OAuth Authorization

### 1. Generate OAuth URL

To generate an OAuth URL so that your client can authorize the application, use the following function:

```php
$config = [
    // ...
    'marketplace_id' => 'ATVPDKIKX0DER',
    'application_id' => 'amzn1.sellerapps.app.0bf296b5-36a6-4942-a13e-EXAMPLEfcd28',
];

$redirect_uri = 'https://app.yourcompany.com/oauth/amazon/redirect';
$state = randomString(); // Pass this state into the redirect handler to verify the redirect request.

$spa = new AmznSPA($config);
$oauth_url = $spa->getOauthUrl($redirect_url, $state);
```

### 2. Handle redirect from Amazon

Once the user completes the authorization process on Amazon, they will be redirected to the URL you provided in the previous step. 

```php
$params = [ // You can also pass $_GET instead of a new array
    'state' => $_GET['state'],
    'selling_partner_id' => $_GET['selling_partner_id'],
    'mws_auth_token' => $_GET['mws_auth_token'], // If you have a hybrid application
    'spapi_oauth_code' => $_GET['spapi_oauth_code'],
];

$config = [
    // ...
    'lwa_client_id' => 'foodev',
    'lwa_client_secret' => 'Y76SDl2F',
];

$spa = new AmznSPA($config);
if($spa->validateOauthRedirect($state_from_step_1, $params)) {
    // Save the selling_partner_id, mws_auth_token to your database.
    list($lwa_refresh_token, $lwa_access_token) = $spa->handleOauthRedirect($params);
    // Save the lwa_refresh_token in your database, keep the access token for the next hour of requests
}
```
