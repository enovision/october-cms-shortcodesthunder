<?php

namespace Enovision\ShortcodesThunder\Shortcodes;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use Enovision\ShortcodesThunder\Classes\Shortcode;

class NoticeShortcode extends Shortcode
{
    private $defaultIcons = [
        'danger' => 'fas fa-exclamation-triangle',
        'info' => 'fas fa-exclamation-circle',
        'warning' => 'fas fa-exclamation-triangle',
        'default' => 'fas fa-exclamation-circle',
        'primary' => 'fas fa-exclamation-circle',
        'success' => 'fas fa-exclamation-circle'
    ];

    public function init()
    {
        $this->shortcode->getHandlers()->add('notice', function (ShortcodeInterface $sc) {
            $type = $sc->getParameter('type', 'info');
            $title = $sc->getParameter('t', ucfirst($type));
            $showTitle = $sc->getParameter('show_title', 1);

            $icon = $sc->getParameter('icon', null);
            if ($icon === null) {
                if (array_key_exists($type, $this->defaultIcons)) {
                    $icon = $this->defaultIcons[$type];
                } else {
                    $icon = $this->defaultIcons['danger'];
                }
            }

            $content = $this->parseDown->line($sc->getContent());

            $hideTitle = !$showTitle ? 'style="display:none;"' : '';

            $border = !$showTitle ? 'no-border' : '';

            $output = "<div class=\"sc-notice {$type}\"><div class=\"notice-content {$border}\"><div class=\"notice-title\" {$hideTitle}><i class=\"{$icon}\"></i>{$title}</div>{$content}</div></div>";

            return $output;
        });
    }
}