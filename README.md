AFDontTranslateBundle
=====================

A bundle for Symfony2 that allows you to switch between translated and untranslated version

[![Latest Stable Version](https://poser.pugx.org/af/dont-translate-bundle/v/stable.png)](https://packagist.org/packages/af/dont-translate-bundle "Latest Stable Version")
[![Latest Unstable Version](https://poser.pugx.org/af/dont-translate-bundle/v/unstable.png)](https://packagist.org/packages/af/dont-translate-bundle "Latest Unstable Version")
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/c9aacbe9-4d32-42e3-83c7-fc4f6ee77d1e/mini.png)](https://insight.sensiolabs.com/projects/c9aacbe9-4d32-42e3-83c7-fc4f6ee77d1e "SensioLabsInsight")
[![Build Status](https://travis-ci.org/antfroger/AfDontTranslateBundle.png?branch=master)](https://travis-ci.org/antfroger/AfDontTranslateBundle "Build status")

Installation
------------

**1. Add the required package using composer.**

```sh
composer require af/dont-translate-bundle:dev-master
```

**2.Add the bundle to your AppKernel.**

```php
<?php
// in %kernel.root_dir%/AppKernel.php
$bundles[] = new Af\Bundle\DontTranslateBundle\AfDontTranslateBundle();
```

**3. Optionally, define the GET parameter name used to not translate the application**

```yaml
# app/config/config.yml
af_dont_translate:
    get_param_name: untrans
```

Usage
-----

To display your application without translation, add the GET parameter `get_param_name` to the URL

```html
http://my-application.io/?untrans
```

License
-------

This library is under the MIT license.
For the full copyright and license information, please view the LICENSE file that was distributed with this source code.

Future features
---------------

* Add the ability to authorize the activation of the don't translate mode only for defined roles
* The don't translate mode can be activated by GET parameters or cookies
