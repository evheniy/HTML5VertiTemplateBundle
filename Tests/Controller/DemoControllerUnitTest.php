<?php

namespace Evheniy\HTML5VertiTemplateBundle\Tests\Controller;

use Evheniy\HTML5VertiTemplateBundle\Controller\DemoController;

class DemoControllerUnitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param string $view
     *
     * @return DemoController
     */
    protected function getController($view)
    {
        $controller = new DemoController();
        $response = $this->getMock('Symfony\Component\HttpFoundation\Response');
        $template = $this->getMock('Symfony\Bundle\FrameworkBundle\Templating\EngineInterface');
        $template
            ->expects($this->once())
            ->method("renderResponse")
            ->with($view, array(), null)
            ->will($this->returnValue($response));

        $container = $this->getMock('Symfony\Component\DependencyInjection\ContainerInterface');
        $container->expects($this->at(0))
            ->method("get")
            ->with("templating")
            ->will($this->returnValue($template));

        $controller->setContainer($container);

        return $controller;
    }

    /**
     *
     */
    public function testIndexAction()
    {
        $this->assertInstanceOf('\Symfony\Component\HttpFoundation\Response', $this->getController('HTML5VertiTemplateBundle:Demo:index.html.twig')->indexAction());
    }

    /**
     *
     */
    public function testLeftSidebarAction()
    {
        $this->assertInstanceOf('\Symfony\Component\HttpFoundation\Response', $this->getController('HTML5VertiTemplateBundle:Demo:left_sidebar.html.twig')->leftSidebarAction());
    }

    /**
     *
     */
    public function testRightSidebarAction()
    {
        $this->assertInstanceOf('\Symfony\Component\HttpFoundation\Response', $this->getController('HTML5VertiTemplateBundle:Demo:right_sidebar.html.twig')->rightSidebarAction());
    }

    /**
     *
     */
    public function testNoSidebarAction()
    {
        $this->assertInstanceOf('\Symfony\Component\HttpFoundation\Response', $this->getController('HTML5VertiTemplateBundle:Demo:no_sidebar.html.twig')->noSidebarAction());
    }
}