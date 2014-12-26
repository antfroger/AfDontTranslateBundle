AFDontTranslateBundle
=====================

A bundle to disable the translation of your Symfony2 applications and only display the translation keys

[![Latest Stable Version](https://poser.pugx.org/antfroger/dont-translate-bundle/v/stable.png)](https://packagist.org/packages/antfroger/dont-translate-bundle "Latest Stable Version")
[![Latest Unstable Version](https://poser.pugx.org/antfroger/dont-translate-bundle/v/unstable.png)](https://packagist.org/packages/antfroger/dont-translate-bundle "Latest Unstable Version")
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/c9aacbe9-4d32-42e3-83c7-fc4f6ee77d1e/mini.png)](https://insight.sensiolabs.com/projects/c9aacbe9-4d32-42e3-83c7-fc4f6ee77d1e "SensioLabsInsight")
[![Build Status](https://travis-ci.org/antfroger/AfDontTranslateBundle.png?branch=master)](https://travis-ci.org/antfroger/AfDontTranslateBundle "Build status")

Installation
------------

**1. Add the required package using composer.**

```sh
composer require antfroger/dont-translate-bundle
```

**2.Add the bundle to your AppKernel.**

```php
<?php
// in %kernel.root_dir%/AppKernel.php
$bundles[] = new Af\Bundle\DontTranslateBundle\AfDontTranslateBundle();
```

**3. Optionally, define the configuration**

* **mode**: the mode you want to use to enable the feature (get, cookie)
* **param_name**: the name of the parameter that you use to enable the feature
* **roles**: the user should at least have one of these roles to be able to enable the feature
  if no role is defined the user doesn't need to be logged in to be able to enable the feature

```yaml
# app/config/config.ym
af_dont_translate:
    mode: "get"
    param_name: "untrans"
    roles: ["ROLE_ADMIN", "ROLE_TRANSLATOR"]
```

Usage
-----

To display your application without translation, add the GET parameter `param_name` to the URL

```html
http://my-application.io/?untrans
```

or add a cookie `param_name` to only see the translation keys in your application

License
-------

This library is under the MIT license.
For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
