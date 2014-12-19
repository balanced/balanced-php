<?php
    require_once '../vendor/twig/twig/lib/Twig/Autoloader.php';
    Twig_Autoloader::register();
    
    $dir = "*/request.php";
    
    define("SCENARIO_CACHE_URL", "https://raw.githubusercontent.com/balanced/balanced-docs/master/scenario.cache");
    
    getScenarioCache();

    foreach(glob($dir) as $file) {
        $scenario_name = dirname($file);
        $scenario_func = new Scenario($scenario_name);
        $rendered = $scenario_func->render();
        if ($rendered) {
            $request = $scenario_func->write_executable($rendered);
            $scenario_func->write_mako();
        }
        else {
            @unlink($scenario_name . "/executable.php");
            echo "Error rendering $scenario_name\n";
        }
    }

    function getScenarioCache() {
        if (file_exists("../scenario.cache")) { unlink ("../scenario.cache"); }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_URL, SCENARIO_CACHE_URL);
        curl_setopt($ch, CURLOPT_SSLVERSION,3);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        file_put_contents("../scenario.cache", $result);
    }

    class Scenario {
        private $scenario;
        private $scenarios_cache;
        private $api_key;
        private $boilerplate = <<<EOT
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::\$api_key = "%s";


EOT;

        function __construct($scenario, $scenario_cache_path =  "../scenario.cache") {
            $this->scenario = $scenario;
            $this->scenarios_cache = json_decode(file_get_contents($scenario_cache_path), TRUE);
            $this->api_key = $this->scenarios_cache['api_key'];
        }

        public function write_executable($rendered) {
            if (empty($rendered)) {
                return false;
            }
            return file_put_contents($this->scenario . '/executable.php',
                                     sprintf($this->boilerplate, $this->api_key) . $rendered . "\n\n?>");
        }

        public function write_mako() {
            $mako_contents = "%if mode == 'definition':\n";
            $mako_contents .= file_get_contents($this->scenario . '/definition.php') . "\n\n";
            $mako_contents .= "% else:\n";
            $mako_contents .= file_get_contents($this->scenario . '/executable.php') . "\n";
            $mako_contents .= "%endif";
            return file_put_contents($this->scenario . '/php.mako', $mako_contents);
        }

        public function render() {
            if (isset($this->scenarios_cache[$this->scenario])) {
                $scenario_cache = $this->scenarios_cache[$this->scenario];
                $loader = new Twig_Loader_Filesystem(__dir__ . "/" . $this->scenario);
                $twig = new Twig_Environment($loader);
                $payload_to_hash = new Twig_SimpleFunction('payload_to_hash', function ($payload) {
                    $formatted_payload = "";
                    foreach ($payload as $k => $v)
                        if (is_array($v)) {
                            $formatted_payload = "  " . $formatted_payload . "'" . $k . "'" .
                                " => array( " . "\n" ;
                            foreach ($v as $a => $b)
                                $formatted_payload = $formatted_payload . "     '" . $a . "'" .
                                    " => " . "'" . $b . "'" . ', ' ;
                            $formatted_payload = $formatted_payload . "\n" . '  ), '  ;
                            }
                        else {
                            $formatted_payload = $formatted_payload . "\n" . "  '" . $k . "'" .
                                " => " . "'" . $v . "'" . ','  ;
                        }
                    return $formatted_payload;
                });
                $twig->addFunction($payload_to_hash);
                $template = $twig->loadTemplate('request.php');
                return $template->render($scenario_cache);
            }
            return false;
        }
    }
?>