<?php

namespace Enovision\ShortcodesThunder\Shortcodes;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use Enovision\ShortcodesThunder\Classes\Shortcode;

class ColorShortcode extends Shortcode
{
    /**
     * Sample:
     *
     * [color c=#ff9910]dit is heel mooi in kleur[/color]
     */
    public function init()
    {
        $this->shortcode->getHandlers()->add('color', function (ShortcodeInterface $sc) {
            $color = $sc->getParameter('c', null);
            $bgColor = $sc->getParameter('bg', null);
            $padding = $sc->getParameter('padding', 3);

            if ($color || $bgColor) {
                $colorString = sprintf("%s%s%s",
                    $color !== null ? "color:{$color};" : '',
                    $bgColor !== null ? "background-color:{$bgColor};" : '',
                    $bgColor !== null ? "padding-left:{$padding}px;padding-right:{$padding}px;" : ''
                );

                return '<span style="' . $colorString . '">' . $sc->getContent() . '</span>';
            }
        });
    }
}