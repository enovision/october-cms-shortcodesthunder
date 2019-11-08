<?php

namespace Enovision\ShortcodesThunder\Shortcodes;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use Enovision\ShortcodesThunder\Classes\Shortcode;

class YoutubeShortcode extends Shortcode
{
    static $defaultOptions = 'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture';
    static $defaultWidth = 640;
    static $defaultHeight = 480;

    var $videoUrl = 'https://www.youtube.com/embed/';

    /**
     * Sample
     *
     * [youtube class=yt-movie w=640 h=480 options=.... ]//www.youtube.com/watch?v=fnxQKvUD_To[/youtube]
     *
     */
    public function init()
    {
        $this->shortcode->getHandlers()->add('youtube', function (ShortcodeInterface $sc) {
            $width = $sc->getParameter('w', self::$defaultWidth);
            $height = $sc->getParameter('h', self::$defaultHeight);
            $class = $sc->getParameter('class', '');
            $options = $sc->getParameter('options', null);
            $fullscreen = $sc->getParameter('fullscreen', 1);
            $border = $sc->getParameter('fullscreen', 0);
            $modestBranding = $sc->getParameter('modest', 1);

            $allow = $options !== null ? $options : self::$defaultOptions;
            $fs = $fullscreen == 1 ? 'allowfullscreen' : '';

            $autoplay = $sc->getParameter('autoplay', 0);
            $showTitle = $sc->getParameter('showTitle', 0);
            $showByline = $sc->getParameter('showByline', 0);
            $showPortrait = $sc->getParameter('showPortrait', 0);
            $showControls = $sc->getParameter('showControls', 1);
            $loop = $sc->getParameter('loop', 0);

            $merger = '?';

            $source = $this->getVideoIdFromUrl($sc->getContent());
            $source = $this->videoUrl . $source;

            if ($autoplay == 1 ) {
                $source .= "{$merger}autoplay={$autoplay}";
                $merger = '&';
            }

            // controls
            $source .= "{$merger}controls={$showControls}";
            $merger = '&';

            // fullscreen
            $source .= "{$merger}fs={$fullscreen}";

            // modest branding
            $source .= "{$merger}modestbranding={$modestBranding}";


            $source .= "{$merger}byline={$showByline}";
            $source .= "{$merger}portrait={$showPortrait}";

            // loop
            $source .= "{$merger}loop={$loop}";

            if (!strpos($source, '?rel=0')) {
                $source .= '?rel=0';
            }

            return "<div class=\"iframe-responsive youtube-video-wrapper {$class}\">
                   <iframe width=\"{$width}\"
                           height=\"{$height}\" 
                           src=\"{$source}\" 
                           frameborder=\"{$border}\" 
                           allow=\"{$allow}\" 
                           {$fs}>
		            </iframe></div>";
        });
    }

    function getVideoIdFromUrl($url)
    {
        $url = urldecode(rawurldecode($url));

        $pattern =
            '%^# Match any youtube URL
                (?:https?://)?  # Optional scheme. Either http or https
                (?:www\.)?      # Optional www subdomain
                (?:             # Group host alternatives
                  youtu\.be/    # Either youtu.be,
                | youtube\.com  # or youtube.com
                  (?:           # Group path alternatives
                    /embed/     # Either /embed/
                  | /v/         # or /v/
                  | /watch\?v=  # or /watch\?v=
                  )             # End path alternatives.
                )               # End host alternatives.
                ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
                $%x';

        $result = preg_match($pattern, $url, $matches);

        return $result ? $matches[1] : $url;
    }

}