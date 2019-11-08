<?php

namespace Enovision\ShortcodesThunder\Shortcodes;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use Enovision\ShortcodesThunder\Classes\Shortcode;

class LightboxShortcode extends Shortcode
{
    protected $postHandler = true;

    private $dependencies = [
        'php'  => 'clike,markup-templating',
        'sass' => 'css'
    ];

    public function init()
    {
        // $this->shortcode->getHandlers()->add('code', function (ShortcodeInterface $sc) {
        //     return $sc->getContent();
        // });

        $this->shortcode->getPostHandlers()->add('lightbox', function (ShortcodeInterface $sc) {
            $content = $sc->getContent();
            $newContent = $this->lightbox($content);
            return $newContent;
        });
    }

    private function lightbox($content)
    {
       // debug($content);

        //Check the page for link images direct to image (no trailing attributes)
        $string = '/<a href="(.*?).(jpg|jpeg|png|gif|bmp|ico)"><img(.*?)class="(.*?)wp-image-(.*?)" \/><\/a>/i';
        preg_match_all($string, $content, $matches, PREG_SET_ORDER);

        //Check which attachment is referenced
        foreach ($matches as $val) {
            $slimbox_caption = '';

           // $post = get_post($val[5]);
           // $slimbox_caption = esc_attr($post->post_content);

            //Replace the instance with the lightbox and title(caption) references. Won't fail if caption is empty.
            $string = '<a href="' . $val[1] . '.' . $val[2] . '"><img' . $val[3] . 'class="' . $val[4] . 'wp-image-' . $val[5] . '" /></a>';
            $replace = '<a href="' . $val[1] . '.' . $val[2] . '" rel="lightbox[this_page]" title="' . $slimbox_caption . '"><img' . $val[3] . 'class="' . $val[4] . 'wp-image-' . $val[5] . '" /></a>';
            $content = str_replace($string, $replace, $content);
        }

        return $content;
    }
}
