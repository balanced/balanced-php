<?php
    require_once(__dir__ . "/Scenario.php");

    define("SCENARIOS_PATH", __dir__);

    if(!is_dir(SCENARIOS_PATH)) {
        fwrite(STDERR, "'" . SCENARIOS_PATH . "' is not a directory.\n");
        exit(1);
    }

    if($handle = opendir(SCENARIOS_PATH)) {
        while(false !== ($current = readdir($handle))) {
           if($current !== "." && $current !== ".." && is_dir(SCENARIOS_PATH . "/" . $current)) {
                if(file_exists(SCENARIOS_PATH . "/" . $current . "/request.php")) {
                    $scenario = new Scenario($current);
                    $rendered = $scenario->render();

                    if($rendered) {
                        $scenario->write_executable($rendered);
                        echo "[CREATED] - " . SCENARIOS_PATH . "/" . $current . "/" . $current . ".php\n";

                        if(file_exists(SCENARIOS_PATH . "/" . $current . "/definition.php")) {
                            $scenario->write_mako(file_get_contents(SCENARIOS_PATH . "/" . $current . "/definition.php"), $rendered);
                            echo "[CREATED] - " . SCENARIOS_PATH . "/" . $current . "/php.mako\n";
                        }
                        ////
                        // No definition exists, but still create the php.mako just will a no definition
                        ////
                        else {
                            $scenario->write_mako('', $rendered);
                            echo "[CREATED] - " . SCENARIOS_PATH . "/" . $current . "/php.mako\n";
                        }
                    } else {
                        echo "*** ERROR ** - " . SCENARIOS_PATH . "/" . $current . " - failed to render scenario. Likely scenario.cache does not have a definition for this scenario.\n";
                    }
                } else {
                    echo "?? SKIPPED ?? - " . SCENARIOS_PATH . "/" . $current . " - missing (request.php)\n";
                }
           }
        }
    }
?>