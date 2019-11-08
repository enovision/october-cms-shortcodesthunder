<?php

namespace Enovision\ShortcodesThunder\Shortcodes;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use Enovision\ShortcodesThunder\Classes\Shortcode;

class VimeoShortcode extends Shortcode
{
    static $defaultOptions = 'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture';
    static $defaultWidth = 640;
    static $defaultHeight = 480;

    var $apiUrl = 'https://player.vimeo.com/api/player.js';
    var $playerUrl = 'https://player.vimeo.com/video/';

    /**
     * Sample
     *
     * [youtube class=yt-movie w=640 h=480 options=.... ]//www.youtube.com/watch?v=fnxQKvUD_To[/youtube]
     *
     */
    public function init()
    {
        $this->shortcode->getHandlers()->add('vimeo', function (ShortcodeInterface $sc) {
            $width = $sc->getParameter('w', self::$defaultWidth);
            $height = $sc->getParameter('h', self::$defaultHeight);
            $class = $sc->getParameter('class', '');
            $fullscreen = $sc->getParameter('fullscreen', 1);
            $border = $sc->getParameter('fullscreen', 0);

            $autoplay = $sc->getParameter('autoplay', 0);
            $showTitle = $sc->getParameter('showTitle', 0);
            $showByline = $sc->getParameter('showByline', 0);
            $showPortrait = $sc->getParameter('showPortrait', 0);
            $loop = $sc->getParameter('loop', 0);

            $allow = $fullscreen == 1 ? 'allowfullscreen;webkitallowfullscreen;mozallowfullscreen' : '';
            $fs = $fullscreen == 1 ? 'allowfullscreen' : '';

            $merger = '?';

            // full url
            $source = $this->playerUrl . $this->filterSource($sc->getContent());

            // autoplay
            $source .= "{$merger}autoplay={$autoplay}";
            $merger = '&';

            // title
            $source .= "{$merger}title={$showTitle}";

            // byline
            $source .= "{$merger}byline={$showByline}";

            // portrait
            $source .= "{$merger}portrait={$showPortrait}";

            // loop
            $source .= "{$merger}loop={$loop}";

            return "<div class=\"iframe-responsive vimeo-video-wrapper {$class}\">
                        <iframe width=\"{$width}\"
                           height=\"{$height}\" 
                           src=\"{$source}\" 
                           frameborder=\"{$border}\"
                           allow=\"{$allow}\"
                           {$fs}>
		            </iframe></div>";
        });
    }

    private function filterSource($video) {
        return (int) substr(parse_url($video, PHP_URL_PATH), 1);
    }

}