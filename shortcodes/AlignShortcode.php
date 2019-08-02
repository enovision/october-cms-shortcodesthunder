<?php

namespace Enovision\ShortcodesThunder\Shortcodes;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use Enovision\ShortcodesThunder\Classes\Shortcode;

class AlignShortcode extends Shortcode
{
    /**
     * Sample:
     *
     * [center]This is centered[/center]
     *
     * [right]Right justified[/right]
     */

    public function init()
    {
        $this->shortcode->getHandlers()->add('center', function (ShortcodeInterface $sc) {
            $content = $this->parseDown->line($sc->getContent());
            return '<div style="text-align: center;">' . $content . '</div>';
        });

        $this->shortcode->getHandlers()->add('left', function (ShortcodeInterface $sc) {
            $content = $this->parseDown->line($sc->getContent());
            return '<div style="text-align: left;">' . $content . '</div>';
        });

        $this->shortcode->getHandlers()->add('right', function (ShortcodeInterface $sc) {
            $content = $this->parseDown->line($sc->getContent());
            return '<div style="text-align: right;">' . $content . '</div>';
        });
    }
}