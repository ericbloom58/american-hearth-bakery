<?php
$quantities = array(
"" => "",
"1" => "1",
"2" => "2",
"3" => "3",
"4" => "4",
"5" => "5",
"6" => "6",
"7" => "7",
"8" => "8",
"9" => "9",
"10" => "10"
);
?>


<?php
foreach($quantities as $key => $value) {
?>
<option style="width: 200px;" value="<?= $key ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
<?php
}
?>