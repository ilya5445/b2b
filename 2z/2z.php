<?php

/**
 * Форматирование параметров Url`а
 * В задании написано написать функцию, но лучше разложить на несколько функций различные опереции на д Url`ом
 *
 * @param string $str
 * @param integer|string $remove_value
 * @return void
 */
function formatUrl(string $str, int|string $remove_value) {

    $url = parse_url($str);

    $path = $url['path'] ?? false;
    $query = $url['query'] ?? false;

    $filtered_params = [];

    if ($query) {

        parse_str($query, $params);

        $filtered_params = array_filter($params, function($value) use ($remove_value) {
            return $value != $remove_value;
        });

        asort($filtered_params);
    }

    if ($path) $filtered_params['url'] = $path;

    return "{$url['scheme']}://{$url['host']}/?" . http_build_query($filtered_params);
}

$url = "https://www.somehost.com/test/index.html?param1=4&param2=3&param3=2&param4=1&param5=3";
$new_url = formatUrl($url, 3);

echo $new_url;