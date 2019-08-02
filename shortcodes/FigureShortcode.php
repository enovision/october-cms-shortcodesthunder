<?php

namespace Enovision\ShortcodesThunder\Shortcodes;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use Enovision\ShortcodesThunder\Classes\Shortcode;

class FigureShortcode extends Shortcode
{
    public function init()
    {
        $this->shortcode->getHandlers()->add('figure', function (ShortcodeInterface $sc) {
            $id = $sc->getParameter('id');
            $class = $sc->getParameter('class');
            $caption = $sc->getParameter('caption');

            $id_output = $id ? 'id="' . $id . '" ' : '';
            $class_output = $class ? 'class="' . $class . '"' : '';
            $caption_output = $caption ? '<figcaption>' . $caption . '</figcaption>' : '';

            $content = $this->parseDown->line($sc->getContent());

            return '<figure ' . $id_output . ' ' . $class_output . '>' . $content . $caption_output . '</figure>';
        });
    }
}
