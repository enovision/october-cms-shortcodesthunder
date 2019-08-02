<?php
namespace Enovision\ShortcodesThunder\Classes;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use October\Rain\Exception\ApplicationException;
use October\Rain\Parse\Parsedown\Parsedown;

use Thunder\Shortcode\EventContainer\EventContainer;
use Thunder\Shortcode\HandlerContainer\HandlerContainer;
use Thunder\Shortcode\Processor\Processor;
use Thunder\Shortcode\Syntax\CommonSyntax;

class ShortcodeManager
{

    public $defaultParser = 'regular';

    public $handlers;

    public $postHandlers;

    public $raw_handlers;

    public $events;

    private $parseDown;

    private $codeblocks = [];

    /**
     * initialize some internal instance variables
     * @param Page $page
     */
    public function __construct()
    {
        $this->handlers = new HandlerContainer();
        $this->postHandlers = new HandlerContainer();
        $this->raw_handlers = new HandlerContainer();
        $this->events = new EventContainer();
        $this->validShortcodes = implode('|', $this->handlers->getNames());
        $this->parseDown = new Parsedown;
    }

    /**
     * returns the current handler container object
     *
     * @return HandlerContainer
     */
    public function getHandlers()
    {
        return $this->handlers;
    }

    /**
     * returns the current handler container object
     *
     * @return HandlerContainer
     */
    public function getPostHandlers()
    {
        return $this->postHandlers;
    }

    /**
     * returns the current raw handler container object
     *
     * @return HandlerContainer
     */
    public function getRawHandlers()
    {
        return $this->raw_handlers;
    }

    /**
     * returns the current event container object
     *
     * @return EventContainer
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * register an individual shortcode with the manager so it can be
     * operated on by the Shortcode library
     *
     * @param string $name the name of the shortcode (should match the classname)
     * @param string $directory directory where the shortcode is located
     */
    public function registerShortcode($name, $directory)
    {
        $path = rtrim($directory, '/') . '/' . $name;
        require_once($path);

        /* Enovision\ShortcodesThunder\Shortcodes */
        $name = "Enovision\\ShortcodesThunder\\Shortcodes\\" . basename($name, '.php');

        if (class_exists($name)) {
            $shortcode = new $name();
            $shortcode->init();
        }
    }

    /**
     * register all files as shortcodes in a particular directory
     * @param string $directory directory where the shortcodes are located
     */
    public function registerAllShortcodes($directory)
    {
        try {
            foreach (new \DirectoryIterator($directory) as $file) {
                if ($file->isDot()) {
                    continue;
                }
                $this->registerShortcode($file->getFilename(), $directory);
            }
        } catch (\UnexpectedValueException $e) {
            throw new ApplicationException('ShortcodeCore Plugin: Directory not found => ' . $directory);
        }
    }

    public function process($text)
    {

        $valid = implode('|', $this->handlers->getNames());

        $regex = '/\[\/?(?:' . $valid . ')[^\]]*\]/';

        if (preg_match($regex, $text, $matches)) {

            $text = $this->maskContentBlocks($text);

            $newText = $this->processContent($text, $this->handlers);

            foreach($this->codeblocks as $block) {
                $times = 1;
                $newText = str_replace($block['id'], $block['match'], $newText, $times);
            }

            return $newText;

        } else {

            return $text;

        }
    }

    public function afterparse($text, $data) {

        $valid = implode('|', $this->postHandlers->getNames());
        $regex = '/\[\/?(?:' . $valid . ')[^\]]*\]/';

        debug('<pre>', $data->text, '</pre>');

        if (preg_match($regex, $data->text, $matches)) {

            debug('johan');

            $newText = $this->processContent($data->text, $this->postHandlers);

            return $newText;

        } else {

            return $data->text;
        }
    }


    /**
     * process the content by running over all the known shortcodes with the
     * chosen parser
     *
     * @param Page $page the page to work on
     * @param Data $config configuration merged with the page config
     * @param null $handlers
     * @return string
     */
    public function processContent($text, $handlers, $post = false)
    {
        $parser = $this->getParser($this->defaultParser);

        if (!$handlers) {
            $handlers = $this->handlers;
        }

        $processor = new Processor(new $parser(new CommonSyntax()), $handlers);
        $processor = $processor->withEventContainer($this->events);

        $processed_content = $processor->process($text);

        if ($post) {
            var_dump('<pre>', $processed_content , '</pre>');
        }

        return $processed_content;
    }


    private function maskContentBlocks($text)
    {
        $regex = '/(`{3}.+?`{3})/ms';

        preg_match_all($regex, $text, $matches, PREG_SET_ORDER, 0);

        if ($matches && count($matches) > 0) {
            foreach ($matches as $match) {
                $uniq = '%%%' . uniqid('shortcodesthunder', true) . '%%%';
                $times = 1;
                $text = str_replace($match[0], $uniq, $text, $times);

                $this->codeblocks[] = [
                    'id' => $uniq,
                    'match' => $match[0]
                ];
            }
        }

        //var_dump('<pre>', $this->codeblocks, '</pre>');

        return $text;
    }


    public function processRawContent($text)
    {
        return $this->processContent($text, $this->raw_handlers);
    }

    /**
     * Allow the processing of shortcodes directly on a string
     * For example when used by Twig directly
     *
     * @param $str
     * @return string
     */
    public function processShortcodes($str)
    {
        $parser = $this->getParser($this->defaultParser);
        $processor = new Processor(new $parser(new CommonSyntax()), $this->handlers);
        $processed_string = $processor->process($str);

        return $processed_string;
    }


    /**
     * Get the appropriate parser object
     *
     * @param $parser
     * @return string
     */
    protected function getParser($parser)
    {
        switch ($parser) {
            case 'regular':
                $parser = 'Thunder\Shortcode\Parser\RegularParser';
                break;
            case 'wordpress':
                $parser = 'Thunder\Shortcode\Parser\WordpressParser';
                break;
            default:
                $parser = 'Thunder\Shortcode\Parser\RegexParser';
                break;
        }

        return $parser;
    }
}
