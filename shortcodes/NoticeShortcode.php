<?php

namespace Enovision\ShortcodesThunder\Shortcodes;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use Enovision\ShortcodesThunder\Classes\Shortcode;

class NoticeShortcode extends Shortcode
{
    public function init()
    {
        $this->shortcode->getHandlers()->add('notice', function (ShortcodeInterface $sc) {
            $type = $sc->getParameter('type', 'info');
            $title = $sc->getParameter('t', ucfirst($type));

            $content = $this->parseDown->line($sc->getContent());
            return "<div class=\"sc-notice {$type}\"><div class='notice-content'><div class='notice-title'>{$title}</div>{$content}</div></div>";
        });
    }
}