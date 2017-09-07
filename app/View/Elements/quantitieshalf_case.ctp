<?php
$quantities = array(
"" => "",
".50" => ".50 case",
"1.00" => "1.00 case",
"1.50" => "1.50 case",
"2.00" => "2.00 case",
"2.50" => "2.50 case",
"3.00" => "3.00 case",
"3.50" => "3.50 case",
"4.00" => "4.00 case",
"4.50" => "4.50 case",
"5.00" => "5.00 case",
"5.50" => "5.50 case",
"6.00" => "6.00 case",
"6.50" => "6.50 case",
"7.00" => "7.00 case",
"7.50" => "7.50 case",
"8.00" => "8.00 case",
"8.50" => "8.50 case",
"9.00" => "9.00 case",
"9.50" => "9.50 case",
"10.00" => "10.00 case"
);
?>


<?php
foreach($quantities as $key => $value) {
?>
<option style="width: 200px;" value="<?= $key ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
<?php
}
?>