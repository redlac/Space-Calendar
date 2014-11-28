<?php

$astroData = file("astronomydata");
$months = 12;
$monthDays = array("Jan"=>31,"Feb"=>28,"Mar"=>31,"Apr"=>30,"May"=>31,"Jun"=>30,"Jul"=>31,"Aug"=>31,"Sep"=>30,"Oct"=>31,"Nov"=>30,"Dec"=>31);

//List of words that match up to icons for calendar.
$keywords = array("New Moon","Full Moon","Mars","Venus","Mercury","Moon Perigee", "Moon Apogee","Shower","Perihelion","Aphelion","Jupiter","Saturn","Neptune","Uranus","First Quarter","Last Quarter","Moon Descending Node","Moon Ascending Node","Aldebaran","Moon North","Spica","Moon South","Vernal Equinox","Total Lunar Eclipse","Annular Solar Eclipse","Summer Solstice","Autumnal Equinox","Winter Solstice","Antares","Partial Solar Eclipse");

//Get basic data for each month without icons for calendar.
function getMonthData($data, $months){
    $currentMonth;
    $lineNum = 0;
    $monthData = array();
    //Get data for each day of each month.
    foreach ($data as $line){
        $currentLine = $data[$lineNum];
        $startLine = substr($currentLine, 0, 3);
        if ($startLine === "All"){
            break;
        }else{
            if (array_key_exists($startLine, $months)){
                $currentMonth = $startLine; 
            }
        } 
        $monthArray = array($currentMonth=>array());
        if (strpos($currentLine, $currentMonth) !== false){
            $dateBegin = substr($currentLine, 4, 2);
            $time = substr($currentLine, 11, 5);
            $event = utf8_encode(substr($currentLine, 16));
            //echo $event;
            $eventDay = ($dateBegin[0] === "0") ? $dateBegin[1] : $dateBegin; 
            $monthArray[$currentMonth] = array($eventDay, $time, $event);
            $monthData[] = $monthArray;
        }else{
            $dateBegin = substr($currentLine, 1, 3);
            $time = substr($currentLine, 9, 5);
            $event = substr($currentLine, 14);
            $eventDay = ($dateBegin[1] === "0") ? $dateBegin[2] : $dateBegin; 
            $monthArray[$currentMonth] = array($eventDay, $time, $event);
            $monthData[] = $monthArray;
        }
        $lineNum++;
    }
    //print_r($monthData);
    return $monthData;
}

//Put in icons for calendar.
function setIcons($keywords, $events){
    $finalEvents = array();
    foreach ($events as $line){
        $iconsArray = checkKeywords($keywords, $line);
        $firstKey = key($line);
        $calData = $line[$firstKey]; 
        $calData[3] = $iconsArray;
        $line[$firstKey] = $calData;
        $finalEvents[] = $line;
    }
    return $finalEvents;
}

function checkKeywords($keywords, $line){
    $icons = array();
    $dayData = reset($line);
    foreach ($keywords as $word){
        if (strpos(trim($dayData[2]), trim($word)) !== false){
            $icons[] = getImageName(trim($word)); 
        }
    }
    return $icons;
}

//Get the image associated with each keyword.
function getImageName($word){
    $autumnKeys = array("autumn"=>"Autumnal Equinox");
    $butterflyKeys = array("butterfly"=>"Vernal Equinox");
    $cometKeys = array("comet"=>"Shower");
    $flowerKeys = array("flower"=>"Summer Solstice");
    $moonDistanceKeys = array("moondistance"=>array("Moon Perigee","Moon Apogee"));
    $planetKeys=array("planet"=>array("Mars","Venus","Mercury","Jupiter","Saturn","Neptune","Uranus","Moon Descending Node","Moon Ascending Node","Moon North","Moon South"));
    $snowflakeKeys = array("snowflake"=>"Winter Solstice");
    $solareclipseKeys = array("solareclipse"=>array("Partial Solar Eclipse","Annular Solar Eclipse"));
    $starKeys = array("star"=>array("Aldebaran","Spica","Antares"));
    $sunKeys = array("sun"=>array("Perihelion","Aphelion"));
    $firstquarterKeys = array("firstquarter"=>"First Quarter");
    $lastquarterKeys = array("lastquarter"=>"Last Quarter");
    $fullmoonKeys = array("fullmoon"=>array("Full Moon","Total Lunar Eclipse"));
    $newmoonKeys = array("newmoon"=>"New Moon");

    $imagesKeys = array($autumnKeys,$butterflyKeys,$cometKeys,$flowerKeys,$moonDistanceKeys,$planetKeys,$snowflakeKeys,$solareclipseKeys,$starKeys,$sunKeys,$firstquarterKeys,$lastquarterKeys,$fullmoonKeys,$newmoonKeys);
    foreach ($imagesKeys as $key){
        $values = reset($key);
        if (is_array($values)){
            $tempValues = array_values($values);
            foreach ($tempValues as $val){
                if ($val === $word){
                    return key($key);
                }
            }
        }else{
            if ($values === $word){
                return key($key);
            }

        }
    }
}

// Encode all data in UTF-8 so it can be encoded as JSON.
function utf8_encode_deep(&$input) {
    if (is_string($input)) {
        $input = utf8_encode($input);
    } else if (is_array($input)) {
        foreach ($input as &$value) {
            utf8_encode_deep($value);
        }

        unset($value);
    } else if (is_object($input)) {
        $vars = array_keys(get_object_vars($input));

        foreach ($vars as $var) {
            utf8_encode_deep($input->$var);
        }
    }
}

    

$eventData = getMonthData($astroData, $monthDays);
$finalEventData = setIcons($keywords, $eventData);

//Encode data in utf-8 for json_encode.
utf8_encode_deep($finalEventData);
echo json_encode($finalEventData);
?>
