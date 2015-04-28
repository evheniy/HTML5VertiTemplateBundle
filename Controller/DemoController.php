<?php

namespace Evheniy\HTML5VertiTemplateBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DemoController
 *
 * @package Evheniy\HTML5VertiTemplateBundle\Controller
 */
class DemoController extends Controller
{
    /**
     * @return Response
     */
    public function indexAction()
    {
        return $this->render('HTML5VertiTemplateBundle:Demo:index.html.twig');
    }

    /**
     * @return Response
     */
    public function leftSidebarAction()
    {
        return $this->render('HTML5VertiTemplateBundle:Demo:left_sidebar.html.twig');
    }

    /**
     * @return Response
     */
    public function rightSidebarAction()
    {
        return $this->render('HTML5VertiTemplateBundle:Demo:right_sidebar.html.twig');
    }

    /**
     * @return Response
     */
    public function noSidebarAction()
    {
        return $this->render('HTML5VertiTemplateBundle:Demo:no_sidebar.html.twig');
    }
}