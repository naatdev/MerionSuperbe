$return = "
.row {
	width: 100%;
	padding: 25px;
	clear: both;
}

.col {
	float: left;
	position: relative;
	padding: 10px;
	min-height: 1px;
}
";
for($i = 0; $i <= $custom['grid']['nbrItems']; $i++) {
    $return .= "
        .col-lg-".$i." {
            width: ".(100/$custom['grid']['nbrItems'])*$i."px;
        }
    ";
}
return $return;