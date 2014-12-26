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

**3. Optionally, define the configuration**

* **get_param_name**: the name of the GET parameter that you use to enable the feature
* **roles**: the user should at least have one of these roles to be able to enable the feature  
  if no role is defined the user doesn't need to be logged in to be able to enable the feature

```yaml
# app/config/config.ym
af_dont_translate:
    get_param_name: "untrans"
    roles: ["ROLE_ADMIN", "ROLE_TRANSLATOR"]
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
