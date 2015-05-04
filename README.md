HTML5VertiTemplateBundle
========================

This bundle provides HTML5 Verti Template for Symfony2

[![Latest Stable Version](https://poser.pugx.org/evheniy/html5-verti-template-bundle/v/stable)](https://packagist.org/packages/evheniy/html5-verti-template-bundle) [![Total Downloads](https://poser.pugx.org/evheniy/html5-verti-template-bundle/downloads)](https://packagist.org/packages/evheniy/html5-verti-template-bundle) [![Latest Unstable Version](https://poser.pugx.org/evheniy/html5-verti-template-bundle/v/unstable)](https://packagist.org/packages/evheniy/html5-verti-template-bundle) [![License](https://poser.pugx.org/evheniy/html5-verti-template-bundle/license)](https://packagist.org/packages/evheniy/html5-verti-template-bundle)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/evheniy/HTML5VertiTemplateBundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/evheniy/HTML5VertiTemplateBundle/?branch=master) [![Build Status](https://scrutinizer-ci.com/g/evheniy/HTML5VertiTemplateBundle/badges/build.png?b=master)](https://scrutinizer-ci.com/g/evheniy/HTML5VertiTemplateBundle/build-status/master)

[![Build Status](https://travis-ci.org/evheniy/HTML5VertiTemplateBundle.svg?branch=master)](https://travis-ci.org/evheniy/HTML5VertiTemplateBundle)

Installation
------------

    $ composer require evheniy/html5-verti-template-bundle "1.*"

Or add to composer.json

    "evheniy/evheniy/html5-verti-template-bundle": "1.*"

AppKernel:

    public function registerBundles()
        {
            $bundles = array(
                ...
                new Evheniy\HTML5VertiTemplateBundle\HTML5VertiTemplateBundle(),
            );
            ...

config.yml:

    #HTML5VertiTemplateBundle
    html5_verti_template: ~

    or

    #HTML5VertiTemplateBundle
    html5_verti_template:
        cdn: cdn.site.com
        
And Assetic Configuration in config.yml:

    #Assetic Configuration
    assetic:
        bundles: [ HTML5VertiTemplateBundle ]
        filters:
            uglifyjs2:
                bin: /usr/local/bin/uglifyjs
            uglifycss:
                bin: /usr/local/bin/uglifycss
            optipng:
                bin: /usr/bin/optipng
            jpegoptim:
                bin: /usr/bin/jpegoptim

This bundle uses [JqueryBundle][5] and [HTML5CacheBundle][6]. So you need to configure those bundles
    
AppKernel:

    public function registerBundles()
        {
            $bundles = array(
                ...
                new Evheniy\JqueryBundle\JqueryBundle(),
                new Evheniy\HTML5CacheBundle\HTML5CacheBundle(),
            );
            ...

config.yml:

    jquery: ~
    html5_cache: ~

The last step

    app/console assetic:dump --env=prod --no-debug
    
And for cache

    app/console manifest:dump

Documentation
-------------

You can use local CDN (domain):

    html5_verti_template:
        cdn: cdn.site.com

Default value is empty

Using
-----




License
-------

This bundle is under the [MIT][3] license.

[Документация на русском языке][1]

[Demo][2]

[Verti is a free responsive site template by HTML5 UP][4]

[1]:  http://makedev.org/articles/symfony/bundles/html5_verti_template_bundle.html
[2]:  http://makedev.org/verty/
[3]:  https://github.com/evheniy/HTML5VertiTemplateBundle/blob/master/Resources/meta/LICENSE
[4]:  http://html5up.net/verti
[5]:  https://github.com/evheniy/JqueryBundle
[6]:  https://github.com/evheniy/HTML5CacheBundle