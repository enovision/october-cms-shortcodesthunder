<?php namespace Enovision\ShortcodesThunder\Models;

use October\Rain\Database\Model;

class Settings extends Model {
	const SETTINGS_CODE = '';

	const FONTAWESOME_4_LINK = '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css';
    const FONTAWESOME_5_LINK = '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css';

    public $implement = [
        'System.Behaviors.SettingsModel',
        '@RainLab.Translate.Behaviors.TranslatableModel',
    ];

	public $settingsCode = 'enovision_shortcodes_thunder_settings';
	public $settingsFields = 'fields.yaml';

    /**
     * @return string
     */
    public function fontawesome4Link() : string
    {
        return self::FONTAWESOME_4_LINK;
    }

    public function fontawesome5Link() : string
    {
        return self::FONTAWESOME_5_LINK;
    }
}