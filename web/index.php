<?php

define('PAGE_HTML_PATH', realpath(__DIR__ . '/../src/page.html'));
define('SCRIPT_JS_PATH', realpath(__DIR__ . '/../src/script.js'));
define('STYLE_CSS_PATH', realpath(__DIR__ . '/../src/style.css'));

if (!file_exists(PAGE_HTML_PATH) || !file_exists(SCRIPT_JS_PATH) || !file_exists(STYLE_CSS_PATH)) {
    exit('Internal Server Error');
}

$content = file_get_contents(PAGE_HTML_PATH);

$content = str_replace('[script.js]', file_get_contents(SCRIPT_JS_PATH), $content);
$content = str_replace('[style.css]', file_get_contents(STYLE_CSS_PATH), $content);
$content = str_replace('[domain]', 'http://' . $_SERVER['SERVER_NAME'], $content);

$content = implode('', array_map('trim', explode("\n", $content)));

foreach([':', '=', ',', '(', ')', '{', '}', '/'] as $char) {
    $content = implode($char, array_map('trim', explode($char, $content)));
}

file_put_contents(__DIR__ . '/index.html', $content);
echo $content;
