<?php
$quantities = array(
"" => "",
".50" => ".50 dozen",
"1.00" => "1.00 dozen",
"1.50" => "1.50 dozen",
"2.00" => "2.00 dozen",
"2.50" => "2.50 dozen",
"3.00" => "3.00 dozen",
"3.50" => "3.50 dozen",
"4.00" => "4.00 dozen",
"4.50" => "4.50 dozen",
"5.00" => "5.00 dozen",
"5.50" => "5.50 dozen",
"6.00" => "6.00 dozen",
"6.50" => "6.50 dozen",
"7.00" => "7.00 dozen",
"7.50" => "7.50 dozen",
"8.00" => "8.00 dozen",
"8.50" => "8.50 dozen",
"9.00" => "9.00 dozen",
"9.50" => "9.50 dozen",
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