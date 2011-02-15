<?php

namespace Equinoxe\SimpleOutputBundle\Service;

class JsonProcessor implements ProcessorInterface
{
    function convert($array) {
        return json_encode($array);
    }
}
