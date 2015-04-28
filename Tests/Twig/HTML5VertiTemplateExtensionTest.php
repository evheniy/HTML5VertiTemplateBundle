<?php

namespace Evheniy\HTML5VertiTemplateBundle\Tests\Twig;

use Evheniy\HTML5VertiTemplateBundle\Twig\HTML5VertiTemplateExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class HTML5VertiTemplateExtensionTest
 *
 * @package Evheniy\HTML5VertiTemplateBundle\Tests\Twig
 */
class HTML5VertiTemplateExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var HTML5VertiTemplateExtension
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
        $this->container = new ContainerBuilder();
        $this->extension = new HTML5VertiTemplateExtension($this->container);
    }

    /**
     * Test normal config
     */
    public function testWithId()
    {
        $this->container->setParameter('html5_verti_template', array('cdn' => 'test'));
        $this->assertTrue($this->container->hasParameter('html5_verti_template'));
        $html5VertiTemplate = $this->container->getParameter('html5_verti_template');
        $this->assertNotEmpty($html5VertiTemplate['cdn']);
        $this->assertEquals($html5VertiTemplate['cdn'], 'test');
        $globals = $this->extension->getGlobals();
        $html5VertiTemplate = $globals['html5_verti_template'];
        $this->assertNotEmpty($html5VertiTemplate['cdn']);
        $this->assertEquals($html5VertiTemplate['cdn'], 'test');
    }

    /**
     * Test empty config
     */
    public function testWithOutLocal()
    {
        $this->assertFalse($this->container->hasParameter('html5_verti_template'));
        $this->setExpectedException(
            'Exception',
            'You have requested a non-existent parameter "html5_verti_template".'
        );
        $this->assertEmpty($this->extension->getGlobals());
    }

    /**
     * Test getName()
     */
    public function testGetName()
    {
        $this->assertEquals($this->extension->getName(), 'html5_verti_template');
    }
} 