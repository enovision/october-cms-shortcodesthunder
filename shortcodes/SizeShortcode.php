<?php
namespace Enovision\ShortcodesThunder\Shortcodes;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use Enovision\ShortcodesThunder\Classes\Shortcode;

class SizeShortcode extends Shortcode
{
    /**
     * Sample:
     *
     * This is [size s=30]bigger text[/size] and this is [color c=blue]blue text[/color]
     */
    public function init()
    {
        $this->shortcode->getHandlers()->add('size', function(ShortcodeInterface $sc) {
            $size = $sc->getParameter('s', $this->getBbCode($sc));
            if ( is_numeric($size) ) { $size = $size.'px' ; }
            return '<span style="font-size: '.$size.';">'.$sc->getContent().'</span>';
        });
    }
}
