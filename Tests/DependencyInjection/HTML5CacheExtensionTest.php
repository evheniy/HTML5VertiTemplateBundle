<?php

namespace Evheniy\HTML5VertiTemplateBundle\Tests\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Evheniy\HTML5VertiTemplateBundle\DependencyInjection\HTML5VertiTemplateExtension;

/**
 * Class HTML5VertiTemplateExtensionTest
 *
 * @package Evheniy\HTML5VertiTemplateBundle\Tests\DependencyInjection
 */
class HTML5VertiTemplateExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var HTML5VertiTemplateExtensionTest
     */
    private $extension;
    /**
     * @var ContainerBuilder
     */
    private $container;

    /**
     *
     */
    protected function setUp()
    {
        $this->extension = new HTML5VertiTemplateExtension();

        $this->container = new ContainerBuilder();
        $this->container->registerExtension($this->extension);
    }

    /**
     * @param ContainerBuilder $container
     * @param string           $resource
     */
    protected function loadConfiguration(ContainerBuilder $container, $resource)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/Fixtures/'));
        $loader->load($resource . '.yml');
    }

    /**
     * Test empty config
     */
    public function testWithoutConfiguration()
    {
        $this->container->loadFromExtension($this->extension->getAlias());
        $this->container->compile();
        $this->assertTrue($this->container->hasParameter('html5_verti_template'));
        $html5VertiTemplate = $this->container->getParameter('html5_verti_template');
        $this->assertNotEmpty($html5VertiTemplate);
        $this->assertTrue(is_array($html5VertiTemplate));
        $this->assertEmpty($html5VertiTemplate['cdn']);
    }

    /**
     * Test normal config
     */
    public function testTest()
    {
        $this->loadConfiguration($this->container, 'test');
        $this->container->compile();
        $this->assertTrue($this->container->hasParameter('html5_verti_template'));
        $html5VertiTemplate = $this->container->getParameter('html5_verti_template');
        $this->assertNotEmpty($html5VertiTemplate['cdn']);
        $this->assertEquals($html5VertiTemplate['cdn'], '//cdn.site.com');
    }

    /**
     * Test filterCdn method
     */
    public function testFilterCdn()
    {
        $reflectionClass = new \ReflectionClass('\Evheniy\HTML5VertiTemplateBundle\DependencyInjection\HTML5VertiTemplateExtension');
        $method = $reflectionClass->getMethod('filterCdn');
        $method->setAccessible(true);
        $this->assertEquals($method->invoke($this->extension, ''), '');
        $this->assertEquals($method->invoke($this->extension, '/'), '');
        $this->assertEquals($method->invoke($this->extension, 'cdn.site.com'), '//cdn.site.com');
        $this->assertEquals($method->invoke($this->extension, '//cdn.site.com'), '//cdn.site.com');
        $this->assertEquals($method->invoke($this->extension, 'http://cdn.site.com'), '//cdn.site.com');
        $this->assertEquals($method->invoke($this->extension, 'http://cdn.site.com/'), '//cdn.site.com');
        $this->assertEquals($method->invoke($this->extension, 'https://cdn.site.com'), '//cdn.site.com');
        $this->assertEquals($method->invoke($this->extension, 'https://cdn.site.com/'), '//cdn.site.com');
    }

    /**
     *
     */
    public function testGetAlias()
    {
        $this->assertEquals($this->extension->getAlias(), 'html5_verti_template');
    }
}
