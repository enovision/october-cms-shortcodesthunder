<?php

namespace Enovision\ShortcodesThunder\Shortcodes;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use Enovision\ShortcodesThunder\Classes\Shortcode;

class AlertShortcode extends Shortcode
{
    public function init()
    {
        $this->shortcode->getHandlers()->add('alert', function (ShortcodeInterface $sc) {
            $type = $sc->getParameter('type', 'info');
            $classes = $sc->getParameter('class', '');
            $content = $this->parseDown->line($sc->getContent());
            return "<div class=\"alert alert-{$type} {$classes}\">{$content}</div>";

        });
    }
}