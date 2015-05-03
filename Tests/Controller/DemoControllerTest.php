<?php

namespace Evheniy\HTML5VertiTemplateBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DemoControllerTest extends WebTestCase
{
    /**
     * @var
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
}