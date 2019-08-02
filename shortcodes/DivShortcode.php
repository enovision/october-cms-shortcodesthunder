<?php

namespace Enovision\ShortcodesThunder\Shortcodes;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use Enovision\ShortcodesThunder\Classes\Shortcode;

class DivShortcode extends Shortcode
{
    /**
     * Sample
     *
     * [div class="text-center"]This text is **centered** aligned[/div]
     *
     */
    public function init()
    {
        $this->shortcode->getHandlers()->add('div', function (ShortcodeInterface $sc) {
            $id = $sc->getParameter('id');
            $class = $sc->getParameter('class');
            $style = $sc->getParameter('style');

            $id_output = $id ? ' id="' . $id . '" ' : '';
            $class_output = $class ? ' class="' . $class . '"' : '';
            $style_output = $style ? ' style="' . $style . '"' : '';

            $content = $this->parseDown->line($sc->getContent());

            return '<div ' . $id_output . $class_output . $style_output . '>' . $content . '</div>';
        });
    }
}