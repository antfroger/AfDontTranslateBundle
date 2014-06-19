AFDontTranslateBundle
=====================

A bundle for Symfony2 that allows you to switch between translated and untranslated version

[![Latest Stable Version](https://poser.pugx.org/af/dont-translate-bundle/v/stable.png)](https://packagist.org/packages/af/dont-translate-bundle "Latest Stable Version")
[![Latest Unstable Version](https://poser.pugx.org/af/dont-translate-bundle/v/unstable.png)](https://packagist.org/packages/af/dont-translate-bundle "Latest Unstable Version")
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/c9aacbe9-4d32-42e3-83c7-fc4f6ee77d1e/mini.png)](https://insight.sensiolabs.com/projects/c9aacbe9-4d32-42e3-83c7-fc4f6ee77d1e "SensioLabsInsight")
# @todo add travis ci

Installation
------------

Add the required package using composer.

```sh
    composer require af/dont-translate-bundle:dev-master
```

Add the bundle to your AppKernel.

```php
    <?php
    // in %kernel.root_dir%/AppKernel.php
    $bundles[] = new Af\Bundle\DontTranslateBundle\AfDontTranslateBundle();
```

To set the GET parameter (only in the `dev` environment, you may simply configure the AfDontTranslateBundle as follows):

```yaml
    # app/config/config.yml
        af_dont_translate:
            get_param_name: untrans
```

You must override a parameter

```yaml
    # app/config/parameters.yml
        translator.class: Af\Bundle\DontTranslateBundle\Translation\Translator
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