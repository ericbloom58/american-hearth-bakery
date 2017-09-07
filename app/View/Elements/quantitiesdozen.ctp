<?php
$quantities = array(
"" => "",
".25" => ".25 dozen",
".50" => ".50 dozen",
".75" => ".75 dozen",
"1.00" => "1.00 dozen",
"1.25" => "1.25 dozen",
"1.50" => "1.50 dozen",
"1.75" => "1.75 dozen",
"2.00" => "2.00 dozen",
"2.25" => "2.25 dozen",
"2.50" => "2.50 dozen",
"2.75" => "2.75 dozen",
"3.00" => "3.00 dozen",
"3.25" => "3.25 dozen",
"3.50" => "3.50 dozen",
"3.75" => "3.75 dozen",
"4.00" => "4.00 dozen",
"4.25" => "4.25 dozen",
"4.50" => "4.50 dozen",
"4.75" => "4.75 dozen",
"5.00" => "5.00 dozen",
"5.25" => "5.25 dozen",
"5.50" => "5.50 dozen",
"5.75" => "5.75 dozen",
"6.00" => "6.00 dozen",
"6.25" => "6.25 dozen",
"6.50" => "6.50 dozen",
"6.75" => "6.75 dozen",
"7.00" => "7.00 dozen",
"7.25" => "7.25 dozen",
"7.50" => "7.50 dozen",
"7.75" => "7.75 dozen",
"8.00" => "8.00 dozen",
"8.25" => "8.25 dozen",
"8.50" => "8.50 dozen",
"8.75" => "8.75 dozen",
"9.00" => "9.00 dozen",
"9.25" => "9.25 dozen",
"9.50" => "9.50 dozen",
"9.75" => "9.75 dozen",
"10.00" => "10.00 dozen"
);
?>


<?php
foreach($quantities as $key => $value) {
?>
<option style="width: 200px;" value="<?= $key ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
<?php
}
?>