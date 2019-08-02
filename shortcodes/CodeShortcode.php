<?php

namespace Enovision\ShortcodesThunder\Shortcodes;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use Enovision\ShortcodesThunder\Classes\Shortcode;

class CodeShortcode extends Shortcode
{
    protected $postHandler = true;

    public function init()
    {
       // $this->shortcode->getHandlers()->add('code', function (ShortcodeInterface $sc) {
       //     return $sc->getContent();
       // });

        $this->shortcode->getPostHandlers()->add('code', function (ShortcodeInterface $sc) {
            $times = 1;

            $search = '<pre>';

            $content = $sc->getContent();

            if (!strpos($content, '<pre>')) {
                return $content;
            }

            $height = $sc->getParameter('height', null);
            $linenumbers = $sc->getParameter('linenumbers', null);
            $lang = $sc->getParameter('lang', 'none');
            $offset = $sc->getParameter('offset', null);
            $hilite = $sc->getParameter('hilite', null);

            $dataStart = $offset !== null ? "data-start=\"{$offset}\"" : '';
            $dataHilite = $offset !== null ? "data-line=\"{$hilite}\"" : '';

            $heightHtml = $height !== null ? "style=\"height:{$height}px; overflow:auto;\"" : '';

            $lineNumberClass = $linenumbers !== null ? 'line-numbers' : '';
            $languageClass = "language-{$lang}";

            $replace = "<pre {$heightHtml} class=\"{$lineNumberClass} $languageClass\" {$dataStart} {$dataHilite}>";

            $newContent = str_replace($search, $replace, $content, $times);

            return $newContent;
        });
    }
}
