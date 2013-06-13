<?php
    require_once 'vendor/twig/twig/lib/Twig/Autoloader.php';
    Twig_Autoloader::register();

    class Scenario {
        private $scenario;
        private $scenario_cache_path;
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
            $this->scenario_cache_path = $scenario_cache_path;
        }

        public function write($rendered) {
            file_put_contents($this->scenario . '/' . $this->scenario . '.php', $this->boilerplate . $rendered);
        }

        public function render() {
            $scenarios_cache = file_get_contents($this->scenario_cache_path);
            $scenarios_cache = json_decode($scenarios_cache, TRUE);
            $scenario_cache = $scenarios_cache[$this->scenario];

            $loader = new Twig_Loader_Filesystem(__dir__ . "/" . $this->scenario);
            $twig = new Twig_Environment($loader);
            $template = $twig->loadTemplate('request.php');
            return $template->render($scenario_cache);
        }
    }

?>