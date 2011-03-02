<?php

namespace Equinoxe\SimpleOutputBundle\Service;

class JsonProcessor implements ProcessorInterface
{
    /**
     * Converts an array to a json string.
     *
     * @param array $array The array to encode.
     * @return string The encoded array.
     */
    function convert($array) {
        return json_encode($array);
    }
}
