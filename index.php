<?php
$teams = array(
    'Marc',
    'Ferdinand',
    'Lukas',
    'HTWK',
    'Johannes',
    'Tino'
);
sort($teams);

$fields = array(
    'A' => 'Main Field (A) (Hall 2)',
    'B' => 'Field B (Hall 2)',
    'C' => 'Field C (Hall 2)',
    'D' => 'Field D (Hall 2)',
    'E' => 'Field E (Glass Hall)',
    'F' => 'Field F (Glass Hall)'
);


$dates = array(
    'thursday' => 'Do, 30.06.2016',
    'friday' => 'Fr, 01.07.2016',
    'saturday' => 'Sa, 02.07.2016',
    'sunday' => 'So, 03.07.2016'
);

?>
<!DOCTYPE html>
<html>
<head>
<title>RoboCup Teaser Image Generator</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.1/semantic.css">
<style>
body {
    margin: 15px;
}
</style>
</head>

<body>
    
<h1>RoboCup Teaser Image Generator</h1>

<div style="width: 500px;">

<form class="ui form" method="GET" action="image.php" target="_blank">
    
    <div class="field">
        <label>Field</label>
        <select name="field" class="ui fluid dropdown">
    <?php
    foreach($fields as $key => $value){
    ?>
    <option value="<?php echo $key ?>"><?php echo $value ?></option>
    <?php } ?>
        </select>
    </div>
    
    <div class="two fields">
        <div class="field">
            <label>Day</label>
            <select name="day" class="ui fluid dropdown">
    <?php
    foreach($dates as $key => $value){
    ?>
    <option value="<?php echo $key ?>"><?php echo $value ?></option>
    <?php } ?>
            </select>
        </div>
        
        
        <div class="two fields">
            <div class="field">
                <label>Hour</label>
                <select name="hour" class="ui fluid dropdown">
                <?php
                for($i = 8; $i <= 17; $i++){
                    $k = strval($i);
                    if($i < 10) $k = '0' . $k;
                ?>
                <option><?php echo $k ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="field">
                <label>Hour</label>
                <select name="min" class="ui fluid dropdown">
                <?php
                for($i = 0; $i <= 45; $i+= 15){
                    $k = strval($i);
                    if($i < 10) $k = '0' . $k;
                ?>
                <option><?php echo $k ?></option>
                <?php } ?>
                </select>
            </div>
        </div>
        
        
    </div>
    
    
    <div class="two fields">
        <div class="field">
            <label>Team A</label>
            <select name="teama" class="ui fluid dropdown">
    <?php
    for($i = 0; $i < sizeof($teams); $i++){
    ?>
    <option><?php echo $teams[$i] ?></option>
    <?php } ?>
            </select>
        </div>
        
        <div class="field">
            <label>Team B</label>
            <select name="teamb" class="ui fluid dropdown">
    <?php
    for($i = 0; $i < sizeof($teams); $i++){
    ?>
    <option><?php echo $teams[$i] ?></option>
    <?php } ?>
            </select>
        </div>
    </div>
    
    <button type="submit" class="ui primary button">
    Create image
    </button>

</form>


</div>

</body>
</html>