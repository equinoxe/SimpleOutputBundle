Allows to publish various formats in a very easy way. All you need is an array.

## Installation

### Add SimpleOutputBundle to your Bundle dir

    git submodule add git://github.com/equinoxe/SimpleOutputBundle.git src/Equinoxe/SimpleOutputBundle

### Add the Equinoxe namespace to your autoload.php

    // app/autoload.php
    $loader->registerNamespaces(array(
        'Equinoxe' => __DIR__ . '/../src',
        // your other namespaces
    );

### Add SimpleOutputBundle to your application kernel

    // app/AppKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            new Equinoxe\SimpleOutputBundle\SimpleOutputBundle(),
            // ...
        );
    }

### Add the available format processors to your config.yml

    // app/config/config.yml
    simpleoutput.config:
        json: Equinoxe\SimpleOutputBundle\Service\JsonProcessor
        xml: Equinoxe\SimpleOutputBundle\Service\XmlProcessor

Processors for other formats can be plugged in at this position as well. Feel free to contribute.

### Define the designated formats in your routing file

    // src/YourCompany/YourBundle/Resources/config/routing.yml
    your_route:
        pattern:  /your/route.{_format}
        defaults: { _controller: YourBundle:Controller:action, _format: json }
        requirements: { _format: (xml|json) }

### Use it in your controller.

#### Direct, using the SimpleOutput-Service

    $simpleOutput = $this->get('equinoxe.simpleoutput');
    return new Response($simpleOutput->convert($response, $_format));

#### Through a supplied view

    public function someAction($_format)
    {
        $response = array(
            "success" => true
        );
        return $this->render('SimpleOutputBundle::plain.' . $_format . '.php', array("response" => $response));
    }

### Call the new action

    /your/route.json

will give you

    {success: true}

where as

    /your/route.xml

will give you

    <?xml version="1.0" encoding="UTF-8"?>
    <content>
        <success>1</success>
    </content>

### Supported formats

At the moment only xml and json is supported. Feel free to fork it to add new formats.