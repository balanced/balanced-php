<?php
  $dir = "**/executable.php";
  foreach(glob($dir) as $file) {
    $path = dirname($file);
    $filename = basename($path);
    #echo $path . "/executable.php";
    $scenario = file_get_contents($path . "/executable.php");
    $scenario = str_replace("require(__DIR__ . '/vendor/autoload.php');",
                     "require(__DIR__ . '../../vendor/autoload.php');",
                     $scenario);
    $scenario = str_replace("<?php",
                    "require(__DIR__ . '../../vendor/autoload.php');",
                     $scenario);
    $scenario = str_replace("?>",
                            "",
                            $scenario);
    echo $path . "\n";
    try {
      echo eval($scenario);
    }
    catch(Exception $e) {
      $response = $e->response;
      echo "Error " . $response->body->status_code . " : " . $response->body->status . " - " . $response->body->category_code . "\n";
      echo $response->body->description . "\n\n";
    }
  }
?>
