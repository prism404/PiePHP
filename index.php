<?php
define('BASE_URI', str_replace('\\', '/', substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT']))));
require_once(implode(DIRECTORY_SEPARATOR, ['Core', 'autoload.php']));
require_once(implode(DIRECTORY_SEPARATOR, ['src/Model', 'UserModel.php']));

// echo BASE_URI . '<br>';
// echo __DIR__ . '<br>';
// echo DIRECTORY_SEPARATOR;

http_response_code(404);

$app = new Core\Core();
$app->run();
?>

<pre><?php var_dump($_POST) ?></pre>
<pre><?php var_dump($_GET) ?></pre>
<pre><?php var_dump($_SERVER) ?></pre>
