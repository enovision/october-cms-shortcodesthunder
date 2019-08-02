<?php

namespace Enovision\ShortcodesThunder\Shortcodes;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use Enovision\ShortcodesThunder\Classes\Shortcode;

class ColumnsShortcode extends Shortcode
{
    /**
     * Sample:
     *
     * [columns count=3 width=200px gap=30px rule="1px dotted #930"]
     * ### Headline
     *
     * Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
     *
     * Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
     *
     * Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
     * [/columns]
     *
     */
    public function init()
    {
        $this->shortcode->getHandlers()->add('columns', function (ShortcodeInterface $sc) {

            $column_count = intval($sc->getParameter('count', 2));
            $column_width = $sc->getParameter('width', 'auto');
            $column_gap = $sc->getParameter('gap', 'normal');
            $column_rule = $sc->getParameter('rule', false);

            $classes = $sc->getParameter('class', '');

            $css_style = 'columns:' . $column_count . ' ' . $column_width . ';-moz-columns:' . $column_count . ' ' . $column_width . ';';
            $css_style .= 'column-gap:' . $column_gap . ';-moz-column-gap:' . $column_gap . ';';

            if ($column_rule) {
                $css_style .= 'column-rule:' . $column_rule . ';-moz-column-rule:' . $column_rule . ';';
            }

            $content = $this->parseDown->parse($sc->getContent());

            return "<div class=\"sc-columns {$classes}\" style=\"{$css_style}\">{$content}</div>";
        });

    }
}