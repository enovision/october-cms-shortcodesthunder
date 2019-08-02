<?php namespace Enovision\ShortcodesThunder;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Event;
use Backend\Classes\Controller as BackendController;
use Illuminate\Support\Facades\App;
use System\Classes\PluginBase;
use Enovision\ShortcodesThunder\Classes\ShortcodeManager;
use System\Classes\SettingsManager;
use Enovision\ShortcodesThunder\Models\Settings;

class Plugin extends PluginBase
{
    protected $fontawesome_4_link = '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css';
    protected $fontawesome_5_link = '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css';

    protected $scManager;

    /**
     * @return array|void
     * Replace the notices in the markdown editor of the blog component
     */
    public function boot()
    {
        $this->app->singleton('Enovision\ShortcodeManager', function ($app) {
            $scManager = new ShortcodeManager();
            return $scManager;
        });

        $sm = App::make('Enovision\ShortcodeManager');
        $sm->registerAllShortcodes(__DIR__ . '/shortcodes');

        Event::listen('markdown.beforeParse', function ($data) {
            $sm = App::make('Enovision\ShortcodeManager');
            $data->text = $sm->process($data->text);
        });

        Event::listen('markdown.parse', function ($text, $data) {
            $sm = App::make('Enovision\ShortcodeManager');
            $data->text = $sm->afterparse($text, $data);
        });

    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'enovision.shortcodesthunder::lang.settings.label',
                'description' => 'enovision.shortcodesthunder::lang.settings.description',
                'icon'        => 'oc-icon-circle-o',
                'category'    =>  SettingsManager::CATEGORY_MYSETTINGS,
                'class'       => 'Enovision\ShortcodesThunder\Models\Settings',
                'order'       => 100
            ]
        ];

    }

    /**
     * Backend
     * add css
     */
    public function register()
    {
        BackendController::extend(function ($controller) {

            if (Settings::get( 'load_plugin_css', true )) {
                $controller->addCss('/plugins/enovision/shortcodesthunder/assets/css/style.css');
                $controller->addCss('/plugins/enovision/shortcodesthunder/assets/css/admin.css');
            }

            if (Settings::get('load_fontawesome', true)) {
                $this->loadFontAwesome($controller);
            }

        });
    }

    /**
     * @return array
     * A component to inject the CSS in the frontend
     */
    public function registerComponents()
    {
        return [
            'Enovision\ShortcodesThunder\Components\ShortcodesThunder' => 'ShortcodesThunder'
        ];
    }

    private function loadFontAwesome($controller) {
        $version = Settings::get('fontawesome_version', 5);

        if ($version === 4) {
            $link = Settings::get('fontawesome_4_link', $this->fontawesome_4_link);
        } else {
            $link = Settings::get('fontawesome_5_link', $this->fontawesome_5_link);
        }

        if ($controller) {
            $controller->addCss($link);
        } else {
            return $link;
        }
    }

    public function fontAwesomeTwig() {
        $link = $this->loadFontAwesome(false);

        $url =  sprintf('<link rel="stylesheet" href="%s">', $link);
        return $url;
    }

    /**
     * Register TWIG extensions
     * @return array
     */
    public function registerMarkupTags() {
        return [
            'functions' => [
                'shortcodesThunderFontawesomeLink' => [$this, 'fontAwesomeTwig' ]
            ]
        ];
    }
}
