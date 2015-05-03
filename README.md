HTML5VertiTemplateBundle
========================

This bundle provides HTML5 Verti Template for Symfony2

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
        
The last step

    app/console assetic:dump --env=prod --no-debug

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