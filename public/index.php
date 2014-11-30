<?php
use App\Support\Foundation\Kernel;

$projectRoot = __DIR__.'/../';

try {
    // include bootstrap file
    require $projectRoot.'bootstrap/bootstrap.php';

    // create and run application
    (new Kernel())->run();

} catch (\Exception $e) {

    // show error
    $message = "Something went wrong. Error Message: ". $e->getMessage();
    echo $message;

    // add trace to the error
    $message.= PHP_EOL . $e->getTraceAsString();

    // save error to the log
    file_put_contents($projectRoot.'logs/errors.log', $message, FILE_APPEND);
}