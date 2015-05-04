<?php

namespace Evheniy\HTML5VertiTemplateBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class DemoControllerTest
 *
 * @package Evheniy\HTML5VertiTemplateBundle\Tests\Controller
 */
class DemoControllerTest extends WebTestCase
{
    /**
     * @var \Symfony\Bundle\FrameworkBundle\Client
     */
    protected $client;

    /**
     *
     */
    protected function setUp()
    {
        $this->client = static::createClient();
        $this->client->getContainer()->get('twig.loader')->addPath(dirname(__FILE__) . '/../../Resources/views/');
        $this->client->getContainer()->get('twig.loader')->addPath(dirname(__FILE__) . '/../../vendor/evheniy/jquery-bundle/Evheniy/JqueryBundle/Resources/views/');
    }

    /**
     *
     */
    public function testIndexAction()
    {
        $crawler = $this->client->request('GET', '/verti/');
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Hi. This is Verti.")')->count()
        );
    }

    /**
     *
     */
    public function testLeftSidebarAction()
    {
        $crawler = $this->client->request('GET', '/verti/left-sidebar.html');
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Left Sidebar")')->count()
        );
    }

    /**
     *
     */
    public function testRightSidebarAction()
    {
        $crawler = $this->client->request('GET', '/verti/right-sidebar.html');
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Right Sidebar")')->count()
        );
    }

    /**
     *
     */
    public function testNoSidebarAction()
    {
        $crawler = $this->client->request('GET', '/verti/no-sidebar.html');
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("No Sidebar")')->count()
        );
    }

    /**
     *
     */
    public function testCDN()
    {
        $this->client = static::createClient(array('environment' => 'cdn', 'debug' => false));
        $this->client->getContainer()->get('twig.loader')->addPath(dirname(__FILE__) . '/../../Resources/views/');
        $this->client->getContainer()->get('twig.loader')->addPath(dirname(__FILE__) . '/../../vendor/evheniy/jquery-bundle/Evheniy/JqueryBundle/Resources/views/');
        $this->client->request('GET', '/verti/');
        $this->assertRegExp('/\/\/cdn\.site\.com\/css\/style\.css/', $this->client->getResponse()->getContent());
        $this->assertRegExp('/\/\/cdn\.site\.com\/css\/style\-desktop\.css/', $this->client->getResponse()->getContent());
        $this->assertRegExp('/\/\/cdn\.site\.com\/css\/ie\/v8\.css/', $this->client->getResponse()->getContent());
        $this->assertRegExp('/\/\/cdn\.site\.com\/css\/ie\/html5shiv\.js/', $this->client->getResponse()->getContent());
        $this->assertRegExp('/var\ cdn\ \=\ \'\/\/cdn.site.com\'\;/', $this->client->getResponse()->getContent());

        $this->client = static::createClient(array('environment' => 'test', 'debug' => false));
        $this->client->getContainer()->get('twig.loader')->addPath(dirname(__FILE__) . '/../../Resources/views/');
        $this->client->getContainer()->get('twig.loader')->addPath(dirname(__FILE__) . '/../../vendor/evheniy/jquery-bundle/Evheniy/JqueryBundle/Resources/views/');
        $this->client->request('GET', '/verti/');
        $this->assertRegExp('/\/css\/style\.css/', $this->client->getResponse()->getContent());
        $this->assertRegExp('/\/css\/style\-desktop\.css/', $this->client->getResponse()->getContent());
        $this->assertRegExp('/\/css\/ie\/v8\.css/', $this->client->getResponse()->getContent());
        $this->assertRegExp('/\/css\/ie\/html5shiv\.js/', $this->client->getResponse()->getContent());
        $this->assertRegExp('/var\ cdn\ \=\ \'\'\;/', $this->client->getResponse()->getContent());
        $this->assertNotRegExp('/\/\/cdn\.site\.com\/css\/style\.css/', $this->client->getResponse()->getContent());
        $this->assertNotRegExp('/\/\/cdn\.site\.com\/css\/style\-desktop\.css/', $this->client->getResponse()->getContent());
        $this->assertNotRegExp('/\/\/cdn\.site\.com\/css\/ie\/v8\.css/', $this->client->getResponse()->getContent());
        $this->assertNotRegExp('/\/\/cdn\.site\.com\/css\/ie\/html5shiv\.js/', $this->client->getResponse()->getContent());
        $this->assertNotRegExp('/var\ cdn\ \=\ \'\/\/cdn.site.com\'\;/', $this->client->getResponse()->getContent());
    }
}