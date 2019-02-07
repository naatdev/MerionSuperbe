$return = "
.row {
	width: 100%;
	margin-top: ".$custom['grid']['marginTopRow'].";
}

.col {
	float: left;
	position: relative;
	padding: 1px 2px 1px 2px;
	min-height: 1px;
	overflow: hidden;
	word-break: break-all;
	margin-top: %grid,marginTopCol%;
}

.row[role=presentation],.col[role=presentation] {
    margin-top: 0px;
}
";
$return .= "@media all and (min-width: 1080px) {";
for($i = 0; $i <= $custom['grid']['nbrItems']; $i++) {
    $return .= "
        .col-lg-".$i." {
            width: ".(100/$custom['grid']['nbrItems'])*$i."%;
        }
    ";
}
$return .= ".col-lg-none { display: none; }";
$return .= "}";
$return .= "@media all and (max-width: 640px) {";
for($i = 0; $i <= $custom['grid']['nbrItems']; $i++) {
    $return .= "
        .col-sm-".$i." {
            width: ".(100/$custom['grid']['nbrItems'])*$i."%;
        }
    ";
}
$return .= ".col-sm-none { display: none; }";
$return .= "}";
$return .= "@media all and (max-width: 1080px) {";
for($i = 0; $i <= $custom['grid']['nbrItems']; $i++) {
    $return .= "
        .col-md-".$i." {
            width: ".(100/$custom['grid']['nbrItems'])*$i."%;
        }
    ";
}
$return .= ".col-md-none { display: none; }";
$return .= "}";
return $return;