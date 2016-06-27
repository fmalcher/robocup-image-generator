<?php
$image = imagecreatefrompng('youtube-teaser.png');
$color = imagecolorallocate($image, 6, 143, 207);

$font_semibold = 'Open_Sans/OpenSans-Semibold.ttf';
$font_extrabold = 'Open_Sans/OpenSans-ExtraBold.ttf';
$font_light = 'Open_Sans/OpenSans-Light.ttf';



//field
$fields = array(
    'A' => 'Main Field (Hall 2)',
    'B' => 'Field B (Hall 2)',
    'C' => 'Field C (Hall 2)',
    'D' => 'Field D (Hall 2)',
    'E' => 'Field E (Glass Hall)',
    'F' => 'Field F (Glass Hall)'
);

$field = $_GET['field'];

$text_field = strtoupper($fields[$field]);
imagettftext($image, 35, 0, 365, 479, $color, $font_semibold, $text_field);

//teams
$team = array();
$team['a'] = $_GET['teama'];
$team['b'] = $_GET['teamb'];
$text_team = $team['a'] . ' &ndash; ' . $team['b'];
imagettftext($image, 30, 0, 365, 552, $color, $font_extrabold, $text_team);



//date
$date = array(
    'thursday' => '30.06.2016',
    'friday' => '01.07.2016',
    'saturday' => '02.07.2016',
    'sunday' => '03.07.2016'
);
$day = $_GET['day'];
$hour = $_GET['hour'];
$min = $_GET['min'];

$text_date = $date[$day] . ' &ndash; ' . $hour . ':' . $min. ' Uhr';
imagettftext($image, 36, 0, 365, 625, $color, $font_light, $text_date);



$slug = $date[$day] . '-' . $hour . $min . '-' . $field . '-' . $team['a'] . '-' . $team['b'];
$slug = preg_replace("/[^A-Za-z0-9\- ]/", '', $slug);
$filename = './results/' . $slug . '.png';

imagepng($image, $filename);
imagedestroy($image);

header('Location: ' . $filename);
exit();
?>
