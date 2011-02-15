Allows to publish various formats in a very easy way. All you need is an array.

## Installation

### Add SimpleOutputBundle to your Bundle dir

    git submodule add git://github.com/equinoxe/SimpleOutputBundle.git src/Equinoxe/SimpleOutputBundle

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

### Define the supported formats in your routing file

    your_route:
        pattern:  /your/route.{_format}
        defaults: { _controller: YourBundle:Controller:action, _format: json }
        requirements: { _format: (xml|json) }

### Use it in your controller.

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

    /your/route.xml

will give you

    <?xml version="1.0" encoding="UTF-8"?>
    <content>
        <success>1</success>
    </content>

### Supported formats

At the moment only xml and json is supported. Feel free to fork it to add new formats.