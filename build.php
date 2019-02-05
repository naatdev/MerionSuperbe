<?php
/*
*       __  ___          _            _____                       __       
*      /  |/  /__  _____(_)___  ____ / ___/__  ______  ___  _____/ /_  ___ 
*     / /|_/ / _ \/ ___/ / __ \/ __ \\__ \/ / / / __ \/ _ \/ ___/ __ \/ _ \
*    / /  / /  __/ /  / / /_/ / / / /__/ / /_/ / /_/ /  __/ /  / /_/ /  __/
*   /_/  /_/\___/_/  /_/\____/_/ /_/____/\__,_/ .___/\___/_/  /_.___/\___/ 
*                                            /_/                           
*/
/*
* settings of directories and files
*/
$settings = array(
    'srcDir' => 'src',
    'filesSrc' => array(
        'buttons.css', 'forms.css', 'main.css', 'navbar.css', 'grid.php'
    ),
    'buildDir' => 'build',
    'custom' => 'src/settings.json',
    'buildFile' => 'stylesheet.css',
    'minify' => False
);

$vars = file_get_contents($settings['custom']);
$custom = json_decode($vars, True);
$buildCss = "";

foreach($settings['filesSrc'] as $file) {
    foreach($custom as $key => $value) {
        foreach($value as $varName => $customVar) {
            if(preg_match("#__#", $customVar)) {
                $customVar = str_replace("__", "", $customVar);
                $customVar = str_replace("%", "", $customVar);
                $customVar = $custom[explode(',', $customVar)[0]][explode(',', $customVar)[1]];
            }
            $buildCss = str_replace("%".$key.",".$varName."%", $customVar, $buildCss);
        }
    }
    if(!preg_match("#.php#", $file)) {
        $buildCss .= file_get_contents($settings['srcDir']."/".$file);
    }
    else{
        $buildCss .= eval(file_get_contents($settings['srcDir']."/".$file));
    }
}

if(!is_dir($settings['buildDir'])) {
    mkdir($settings['buildDir']);
}
else{
    if(file_exists($settings['buildDir']."/".$settings['buildFile'])) {
        @unlink($settings['buildDir']."/".$settings['buildFile']);
    }
}

if($settings['minify']) {
    $buildCss = str_replace(" ", "", $buildCss);
    $buildCss = str_replace("
", "", $buildCss);
}
echo "<pre>".$buildCss."</pre>";
if(file_put_contents($settings['buildDir']."/".$settings['buildFile'], $buildCss)) {
    echo "CSS generated !";
}
else{
    echo "An error occured...";
}