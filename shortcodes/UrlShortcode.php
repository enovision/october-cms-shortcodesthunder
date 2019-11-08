<?php

namespace Enovision\ShortcodesThunder\Shortcodes;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use Enovision\ShortcodesThunder\Classes\Shortcode;


class UrlShortcode extends Shortcode
{
    /**
     * Sample
     *
     * [url target="_blank" title="Official website Enovision"]https://www.enovision.net[/url]
     *
     */
    public function init()
    {
        $this->shortcode->getHandlers()->add('url', function (ShortcodeInterface $sc) {
            $caption = $sc->getContent();
            $www = $sc->getParameter('www', '#');
            $title = $sc->getParameter('title', false);
            $target = $sc->getParameter('target', false);
            $class = $sc->getParameter('class', '');

            $_target = $target !== false ? 'target="' . $target . '"' : '';
            $_class = $class !== '' ? 'class="' . $class . '"' : '';

            if (empty($caption)) {
                $caption = $www;
            }

            if ($title === false) {
                $title = $www;
            }

            $_title = 'title="' . $title . '"';

            return '<a href="' . $www . '" ' . $_target . ' ' . $_class . ' ' . $_title . '>' . $caption . '</a>';

        });
    }
}