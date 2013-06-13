<?php
    require_once 'vendor/twig/twig/lib/Twig/Autoloader.php';
    Twig_Autoloader::register();

    class Scenario {
        private $scenario;
        private $scenarios_cache;
        private $boilerplate = <<<EOT
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::\$api_key = "2fd37702d33511e2a00f026ba7d31e6f";


EOT;

        function __construct($scenario, $scenario_cache_path =  "../scenario.cache") {
            $this->scenario = $scenario;
            $this->scenarios_cache = json_decode(file_get_contents($scenario_cache_path), TRUE);
        }

        public function write_executable($rendered) {
            if(empty($rendered)) {
                return false;
            }

            return file_put_contents($this->scenario . '/' . $this->scenario . '.php', $this->boilerplate . $rendered);
        }

        public function write_mako($definition, $request) {
            $mako_contents = "% if mode == 'definition':\n";
            $mako_contents .= $definition . "\n\n";
            $mako_contents .= "% else:\n";
            $mako_contents .= $this->boilerplate;
            $mako_contents .= $request . "\n";
            $mako_contents .= "% endif";

            return file_put_contents($this->scenario . '/php.mako', $mako_contents);
        }

        public function render() {
            if(isset($this->scenarios_cache[$this->scenario])) {
                $scenario_cache = $this->scenarios_cache[$this->scenario];

                $loader = new Twig_Loader_Filesystem(__dir__ . "/" . $this->scenario);
                $twig = new Twig_Environment($loader);
                $template = $twig->loadTemplate('request.php');
                return $template->render($scenario_cache);
            }

            return false;
        }
    }
?>