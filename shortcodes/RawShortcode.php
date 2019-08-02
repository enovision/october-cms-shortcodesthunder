<?php
namespace Enovision\ShortcodesThunder\Shortcodes;

use Thunder\Shortcode\EventHandler\FilterRawEventHandler;
use Thunder\Shortcode\Events;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use Enovision\ShortcodesThunder\Classes\Shortcode;

class RawShortcode extends Shortcode
{
    public function init()
    {
        $this->shortcode->getHandlers()->add('raw', function(ShortcodeInterface $sc) {
            return trim($sc->getContent());
        });

        $this->shortcode->getEvents()->addListener(Events::FILTER_SHORTCODES, new FilterRawEventHandler(array('raw')));
    }

}