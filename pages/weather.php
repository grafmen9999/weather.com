<?

require_once('../lib/includes/db.php'); // Для session
require_once('../lib/simple_html_dom.php');

function get_curl($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $r = curl_exec($ch);

    curl_close($ch);

    return $r;
}

function parse($what)
{
    $result = array();

    $el = str_get_html($what);

    // block {
    $result['current_time'] = trim($el->find('time', 0)->plaintext); // Current time from server
    $result['current_temperature_1'] = trim($el->find('.tab-content .temperature.tab-weather__value .unit.unit_temperature_c', 0)->plaintext);
    $result['current_temperature_2'] = trim($el->find('.tab-content .temperature.tab-weather__feel .unit.unit_temperature_c', 0)->plaintext);
    $result['current_about_weather'] = trim($el->find('.tabs a', 0)->{'data-text'});

    $result['country'] = trim($el->find('ul.breadcrumbs__list li a span', 0)->plaintext);
    $result['region'] = trim($el->find('ul.breadcrumbs__list li a span', 1)->plaintext);
    $result['city'] = trim($el->find('ul.breadcrumbs__list li a span', 2)->plaintext);

    $result['widget-time'][] = trim($el->find('.widget__container .widget__item .w_time', 0)->plaintext);
    $result['widget-time'][] = trim($el->find('.widget__container .widget__item .w_time', 1)->plaintext);
    $result['widget-time'][] = trim($el->find('.widget__container .widget__item .w_time', 2)->plaintext);
    $result['widget-time'][] = trim($el->find('.widget__container .widget__item .w_time', 3)->plaintext);
    $result['widget-time'][] = trim($el->find('.widget__container .widget__item .w_time', 4)->plaintext);
    $result['widget-time'][] = trim($el->find('.widget__container .widget__item .w_time', 5)->plaintext);
    $result['widget-time'][] = trim($el->find('.widget__container .widget__item .w_time', 6)->plaintext);
    $result['widget-time'][] = trim($el->find('.widget__container .widget__item .w_time', 7)->plaintext);

    $result['widget-about_weather'][] = trim($el->find('.widget__container .widget__item span.tooltip', 0)->{'data-text'});
    $result['widget-about_weather'][] = trim($el->find('.widget__container .widget__item span.tooltip', 1)->{'data-text'});
    $result['widget-about_weather'][] = trim($el->find('.widget__container .widget__item span.tooltip', 2)->{'data-text'});
    $result['widget-about_weather'][] = trim($el->find('.widget__container .widget__item span.tooltip', 3)->{'data-text'});
    $result['widget-about_weather'][] = trim($el->find('.widget__container .widget__item span.tooltip', 4)->{'data-text'});
    $result['widget-about_weather'][] = trim($el->find('.widget__container .widget__item span.tooltip', 5)->{'data-text'});
    $result['widget-about_weather'][] = trim($el->find('.widget__container .widget__item span.tooltip', 6)->{'data-text'});
    $result['widget-about_weather'][] = trim($el->find('.widget__container .widget__item span.tooltip', 7)->{'data-text'});

    $result['widget-temperature'][] = trim($el->find('.widget__container .w_temperature .value .unit_temperature_c', 0)->plaintext);
    $result['widget-temperature'][] = trim($el->find('.widget__container .w_temperature .value .unit_temperature_c', 1)->plaintext);
    $result['widget-temperature'][] = trim($el->find('.widget__container .w_temperature .value .unit_temperature_c', 2)->plaintext);
    $result['widget-temperature'][] = trim($el->find('.widget__container .w_temperature .value .unit_temperature_c', 3)->plaintext);
    $result['widget-temperature'][] = trim($el->find('.widget__container .w_temperature .value .unit_temperature_c', 4)->plaintext);
    $result['widget-temperature'][] = trim($el->find('.widget__container .w_temperature .value .unit_temperature_c', 5)->plaintext);
    $result['widget-temperature'][] = trim($el->find('.widget__container .w_temperature .value .unit_temperature_c', 6)->plaintext);
    $result['widget-temperature'][] = trim($el->find('.widget__container .w_temperature .value .unit_temperature_c', 7)->plaintext);

    $result['widget-speed_wind'][] = trim($el->find('.widget__container .w_wind .unit_wind_m_s', 0)->plaintext);
    $result['widget-speed_wind'][] = trim($el->find('.widget__container .w_wind .unit_wind_m_s', 1)->plaintext);
    $result['widget-speed_wind'][] = trim($el->find('.widget__container .w_wind .unit_wind_m_s', 2)->plaintext);
    $result['widget-speed_wind'][] = trim($el->find('.widget__container .w_wind .unit_wind_m_s', 3)->plaintext);
    $result['widget-speed_wind'][] = trim($el->find('.widget__container .w_wind .unit_wind_m_s', 4)->plaintext);
    $result['widget-speed_wind'][] = trim($el->find('.widget__container .w_wind .unit_wind_m_s', 5)->plaintext);
    $result['widget-speed_wind'][] = trim($el->find('.widget__container .w_wind .unit_wind_m_s', 6)->plaintext);
    $result['widget-speed_wind'][] = trim($el->find('.widget__container .w_wind .unit_wind_m_s', 7)->plaintext);

    $result['widget-wind_direction'][] = trim($el->find('.widget__container .w_wind__direction', 0)->plaintext);
    $result['widget-wind_direction'][] = trim($el->find('.widget__container .w_wind__direction', 1)->plaintext);
    $result['widget-wind_direction'][] = trim($el->find('.widget__container .w_wind__direction', 2)->plaintext);
    $result['widget-wind_direction'][] = trim($el->find('.widget__container .w_wind__direction', 3)->plaintext);
    $result['widget-wind_direction'][] = trim($el->find('.widget__container .w_wind__direction', 4)->plaintext);
    $result['widget-wind_direction'][] = trim($el->find('.widget__container .w_wind__direction', 5)->plaintext);
    $result['widget-wind_direction'][] = trim($el->find('.widget__container .w_wind__direction', 6)->plaintext);
    $result['widget-wind_direction'][] = trim($el->find('.widget__container .w_wind__direction', 7)->plaintext);

    $result['widget-precipitation'][] = trim($el->find('.widget__container .w_prec .w_prec__value', 0)->plaintext);
    $result['widget-precipitation'][] = trim($el->find('.widget__container .w_prec .w_prec__value', 1)->plaintext);
    $result['widget-precipitation'][] = trim($el->find('.widget__container .w_prec .w_prec__value', 2)->plaintext);
    $result['widget-precipitation'][] = trim($el->find('.widget__container .w_prec .w_prec__value', 3)->plaintext);
    $result['widget-precipitation'][] = trim($el->find('.widget__container .w_prec .w_prec__value', 4)->plaintext);
    $result['widget-precipitation'][] = trim($el->find('.widget__container .w_prec .w_prec__value', 5)->plaintext);
    $result['widget-precipitation'][] = trim($el->find('.widget__container .w_prec .w_prec__value', 6)->plaintext);
    $result['widget-precipitation'][] = trim($el->find('.widget__container .w_prec .w_prec__value', 7)->plaintext);

    $result['widget-precipitanion-without'] = trim($el->find('.widget__container .w_prec__without', 0)->plaintext);
    
    // }

    $el->clear();
    unset($el);

    return $result; // Возвращаю данные которые получил из html страницы

}

if (isset($_SESSION['user_log'])) {

    $response = get_curl("https://www.gismeteo.ua/weather-zaporizhia-5093/");

    if (!$response) {
        echo "<head><meta charset='UTF-8'><title>Погода</title><link rel='stylesheet' href='../css/style.css'>
        <link rel='stylesheet' href='../css/style_weather.css'></head><body><div class='center response error'>Не удалось соедениться с удаленным сервером. Пожалуйста, проверьте ваше соединение с интернетом!</div></body>";
        exit();
    }

    $data = parse($response);
// $data = parse(get_curl("https://www.gismeteo.ua/weather-lviv-4949/"));

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Погода</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_weather.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/main.js"></script>
</head>

<body>
    <?php include("../lib/includes/header.php") ?>
    <div class="container">
        <h1>Погода</h1>
        <div id="today__weather">
            <div id="weather-now">
                <div>В
                    <span id="region"><?php echo $data['country'] . ' / ' . $data['region'] . ' / ' . $data['city']; ?></span>
                </div>
                <div>На текущий момент:
                    <span id="date"><?php echo $data['current_time']; ?></span>
                </div>
                <div>
                    <div id="weather-current_temperature_1">Текущая температура: <?php echo $data['current_temperature_1']; ?></div>
                    <div id="weather-current_temperature_2">По ощущению: <?php echo $data['current_temperature_2']; ?></div>
                    <div id="weather-current_about"><?php echo $data['current_about_weather']; ?></div>
                </div>
            </div>
            <div id="schedule-weather">
                <table cellspacing="0">
                    <tr>
                        <td>Время</td>
                        <?php
                        foreach ($data['widget-time'] as $val) {
                            echo "<td>" . $val . "</td>";
                        }
                    ?>
                    </tr>
                    <tr>
                        <td>Состояние</td>
                        <?php
                        foreach ($data['widget-about_weather'] as $val) {
                            echo "<td>" . $val . "</td>";
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>Температура</td>
                        <?php
                        foreach ($data['widget-temperature'] as $val) {
                            echo "<td>" . $val . "</td>";
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>Скорость ветра</td>
                        <?php
                        foreach ($data['widget-speed_wind'] as $val) {
                            echo "<td>" . $val . "</td>";
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>Направление ветра</td>
                        <?php
                        foreach ($data['widget-wind_direction'] as $val) {
                            echo "<td>" . $val . "</td>";
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>Осадки</td>
                        <?php
                        if (empty($data['widget-precipitanion-without'])) {
                            foreach ($data['widget-precipitation'] as $val) {
                                echo "<td>" . $val . "</td>";
                            }
                        }
                        else {
                            echo "<td colspan='8'>".$data['widget-precipitanion-without']."</td>";
                        }
                        ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

<?php 
}
else { ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Погода</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_weather.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/main.js"></script>
</head>
<body>
    <?php include("../lib/includes/header.php") ?>
    <div class="container">
        <h1>Погода</h1>
        <div>Вы не авторизованы, пожалуйста авторизуйтесь по этой <a href="./login.php">ссылке</a></div>
    </div>
</body>
</html>
<?php } ?>