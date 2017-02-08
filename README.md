# zend-intercom
A Zend Framework 2 module that lets you to use the Intercom service.

#Installation

This module is available on [Github](https://github.com/BnitoBzh/zend-intercom).
In your project's `composer.json` use:

    {   
        "require": {
            "bnitobzh/zend-intercom": "dev-master"
    }
    
Run `php composer.phar update` to download it into your vendor folder and setup autoloading.

Now copy `zend-intercom.local.php.dist` to `yourapp/config/autoload/zend-intercom.local.php` and add your Intercom API key and App key.

Add `ZendIntercom` to the modules array in your `application.config.php`, preferably as the first module. 

That's it. There's nothing more you need to do, everything works at that stage.
