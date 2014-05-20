AFDontTranslateBundle
=====================

A bundle for Symfony2 that allows you to switch between translated and untranslated version

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/c9aacbe9-4d32-42e3-83c7-fc4f6ee77d1e/mini.png)](https://insight.sensiolabs.com/projects/c9aacbe9-4d32-42e3-83c7-fc4f6ee77d1e "SensioLabsInsight")

Installation
------------

Add the required package using composer.

    composer require af/dont-translate-bundle:dev-master

Add the bundle to your AppKernel.

    <?php
    // in %kernel.root_dir%/AppKernel.php
    $bundles[] = new Af\Bundle\DontTranslateBundle\AfDontTranslateBundle();
