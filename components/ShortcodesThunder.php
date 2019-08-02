<?php

namespace Enovision\ShortcodesThunder\Components;

use Enovision\ShortcodesThunder\Models\Settings;

class ShortcodesThunder extends \Cms\Classes\ComponentBase {

	public function componentDetails() {
		return [
			'name'        => 'Shortcodes Thunder',
			'description' => 'Just the CSS nothing more'
		];
	}

	public function onRun() {

        if (Settings::get( 'load_plugin_css', true )) {
            $this->addCss('/plugins/enovision/shortcodesthunder/assets/css/style.css');
        }

        if (Settings::get('load_fontawesome', true)) {
            $this->loadFontAwesome();
        }

	}

    private function loadFontAwesome() {
        $version = Settings::get('fontawesome_version', 5);

        if ($version == 4) {
            $link = Settings::get('fontawesome_4_link', Settings::FONTAWESOME_4_LINK);
        } else {
            $link = Settings::get('fontawesome_5_link', Settings::FONTAWESOME_5_LINK);
        }

        $this->addCss($link);
    }
}