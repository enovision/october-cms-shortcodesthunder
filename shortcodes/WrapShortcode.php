<?php

namespace Enovision\ShortcodesThunder\Shortcodes;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use Enovision\ShortcodesThunder\Classes\Shortcode;

class WrapShortcode extends Shortcode
{
    private $validTags = ['div', 'span', 'p'];

    /**
     * Sample:
     *
     * [wrap tag=div class=pt-0]....[/wrap]
     */
    public function init()
    {
        $this->shortcode->getHandlers()->add('wrap', function (ShortcodeInterface $sc) {
            $tag = $sc->getParameter('tag', 'div');
            $class = $sc->getParameter('class', null);
            $id = $sc->getParameter('id', null);
            $uniqueId = $sc->getParameter('unique', false);

            if ($tag && in_array($tag, $this->validTags)) {

                $prefix = '';

                if ($uniqueId) {
                    $prefix = $id !== null ? $id . '-' : 'id-';
                }

                $idid = '';
                if ($id || $uniqueId) {
                    if ($id === null) {
                        $id = uniqid(true);
                    }

                    $idid = 'id="' . str_replace(' ', '-', trim("{$prefix}{$id}")) . '"';
                }

                $classes = $class !== null ? "class=\"$class\"" : '';

                $content = $this->parseDown->line($sc->getContent());

                return sprintf('<%s %s %s>%s</%s>',
                    $tag, $idid, $classes, $content, $tag
                );
            }
        });
    }
}