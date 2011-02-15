<?php

namespace Equinoxe\SimpleOutputBundle\Service;


class SimpleOutput
{
    function __construct($container) {
        $this->container = $container;
    }
    
    function convert($array, $format) {
        $converter = $this->container->get('equinoxe.simpleoutput.processor.' . $format);
        return $converter->convert($array);
    }
}
