<?php
namespace Enovision\ShortcodesThunder\Shortcodes;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use Enovision\ShortcodesThunder\Classes\Shortcode;

class BootstrapTableShortcode extends Shortcode
{
    public function init()
    {
        $this->shortcode->getHandlers()->add('table', function(ShortcodeInterface $sc) {
            $times = 1;

            $class = $sc->getParameter('class', '');

            $html = $this->parseDown->parse($sc->getContent());

            $search = '<table>';
            $replace = "<table class=\"table {$class}\">";
            $newHtml = str_replace($search, $replace, $html, $times );

            return $newHtml;
        });
    }
}
