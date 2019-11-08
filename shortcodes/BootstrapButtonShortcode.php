<?php

namespace Enovision\ShortcodesThunder\Shortcodes;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use Enovision\ShortcodesThunder\Classes\Shortcode;

class BootstrapButtonShortcode extends Shortcode
{
    /**
     * Sample
     * <a href="#" class="btn btn-primary btn-lg disabled" role="button" aria-disabled="true">Primary link</a>
     */

    public function init()
    {
        $this->shortcode->getHandlers()->add('button', function (ShortcodeInterface $sc) {
            $caption = $sc->getContent();
            $class = $sc->getParameter('class', '');

            $style = $sc->getParameter('style', 'primary');

            if (!in_array($style, ['info', 'primary', 'success', 'warning', 'default', 'danger'])) {
                $style = 'primary';
            }

            $size = $sc->getParameter('size', 'normal');
            $href = $sc->getParameter('href', '#');
            $target = $sc->getParameter('target', '_blank');

            $_size = '';
            if (in_array($size, ['sm', 'lg'])) {
                $_size = 'btn-' . $size;
            };

            return '<a href="' . $href . '" class="btn btn-'. $style . ' ' . $_size . ' ' . $class . '" role="button" aria-disabled="true" target="' . $target . '">' . $caption . '</a>';
        });
    }
}
