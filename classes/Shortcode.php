<?php

namespace Enovision\ShortcodesThunder\Classes;

use Illuminate\Support\Facades\App;
use October\Rain\Parse\Parsedown\Parsedown;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;

class Shortcode
{
    protected $postHandler = false;

    protected $shortcode;
    protected $config;
    protected $twig;

    protected $parser = 'regular';

    protected $parseDown;

    /**
     * set some instance variable states
     */
    public function __construct()
    {
        $this->shortcode = App::make('Enovision\ShortcodeManager');

        $this->parseDown = new Parsedown();
    }

    /**
     * do some work
     */
    public function init()
    {
        $this->shortcode->handlers->add('u', function (ShortcodeInterface $shortcode) {
            return $shortcode->getContent();
        });
    }

    /**
     * returns the name of the class if required
     *
     * @return string the name of the class
     */
    public function getName()
    {
        return get_class($this);
    }

    public function getParser()
    {
        return $this->parser;
    }

    public function getBbCode($sc, $default = null)
    {
        $code = $default;

        $params = $sc->getParameters();

        if (is_array($params)) {
            $keys = array_keys($params);
            $code = trim(array_shift($keys), '=');
        }

        return $code;
    }

}
