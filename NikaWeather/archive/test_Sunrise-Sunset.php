<?php
$timestampTest = strtotime("2022-05-10");
echo $timestampTest . "<br/>";
echo date_sunrise($timestampTest, SUNFUNCS_RET_STRING, 43.6535, 6.94082, $zenithTocquevilleSunrise, 2) . "\n";
echo date_sunset($timestampTest, SUNFUNCS_RET_STRING, 43.6535, 6.94082, $zenithTocquevilleSunset, 2);

echo "<br>";
echo "____________________________________" . "<br>";
echo "<br>";