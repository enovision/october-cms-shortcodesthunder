<?php

namespace Enovision\ShortcodesThunder\Shortcodes;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use Enovision\ShortcodesThunder\Classes\Shortcode;

class EmailShortcode extends Shortcode
{
    /**
     * Sample
     *
     * [email]j.vd.merwe@enovision.net[/email]
     *
     */
    public function init()
    {
        $this->shortcode->getHandlers()->add('email', function (ShortcodeInterface $sc) {
            $email = $sc->getBbCode() ?: $sc->getContent();

            $obfusecated = "";
            for ($i=0; $i<strlen($email); $i++){
                $obfusecated .= "&#" . ord($email[$i]) . ";";
            }

            $caption = $sc->getParameter('caption', '');
            $_caption = $caption !== '' ? $caption : $obfusecated;

            $class = $sc->getParameter('class', '');
            $_class = $class !== '' ? 'class="' . $class . '"' : '';

            return '<a ' . $_class . 'href="mailto:' . $obfusecated . '">' . $_caption . '</a>';

        });
    }
}