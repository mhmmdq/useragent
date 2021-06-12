# Php package detects user browser details
This package extracts `$_SERVER['HTTP_USER_AGENT']` details of the client browser and provides the details to you as an array.
##  Installation
Installed by [Composer](https://getcomposer.org/ "Composer")
```bash
$ composer require mhmmdq\useragent
```
## How to use
To use the package, first add the Autoloder Composer file to the software and then call the class
```php
<?php

require __DIR__ . '/vendor/autoload.php';

use Mhmmdq\Useragent\UserAgent;

$useragent = UserAgent::analyze();

var_dump($useragent);
```
The output provides you with user information that has the following information

`useragent` useragent received from the client browser

`browser` An array containing the name and version of the client browser

`platform` Client platform

`language` Client browser language derived from `$_SERVER['HTTP_ACCEPT_LANGUAGE']` analysis

`is_mobile` Check whether the client is mobile or not (The output of this value is **true** or **false**)
##### If you need to check different user agents, you can pass them to the analysis method
```php
$useragent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36';
var_dump(UserAgent::analyze($useragent));
```
### Check if the client is mobile or not
You can use the following method to do this
```php
UserAgent::is_mobile();
```
##### Example
```php
if(UserAgent::is_mobile()) {
    header('location: https://m.example.com');
}
```
### Get the default browser language
The default language of the client browser is received using `$_SERVER['HTTP_ACCEPT_LANGUAGE']` and after checking the output is provided as a string
```php
UserAgent::lang();
```


------------


- [List of browsers recognizable by this class](./browsers.md "List of browsers recognizable by this class")
- [List of recognizable operating systems](./os.md "List of recognizable operating systems")
- [List of recognizable platforms](./platform.md "List of recognizable platforms")
