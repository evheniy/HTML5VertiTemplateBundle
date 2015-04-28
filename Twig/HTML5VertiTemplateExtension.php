<?php

namespace Evheniy\HTML5VertiTemplateBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class HTML5VertiTemplateExtension
 *
 * @package Evheniy\HTML5VertiTemplateBundle\Twig
 */
class HTML5VertiTemplateExtension extends \Twig_Extension
{
    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @return array
     */
    public function getGlobals()
    {
        return array(
            'html5_verti_template' => $this->container->getParameter('html5_verti_template')
        );
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'html5_verti_template';
    }
}
