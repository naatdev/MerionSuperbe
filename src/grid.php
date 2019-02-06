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
";
for($i = 0; $i <= $custom['grid']['nbrItems']; $i++) {
    $return .= "
        .col-lg-".$i." {
            width: ".(100/$custom['grid']['nbrItems'])*$i."%;
        }
    ";
}
$return .= "@media all and (max-width: 640px) {";
for($i = 0; $i <= $custom['grid']['nbrItems']; $i++) {
    $return .= "
        .col-sm-".$i." {
            width: ".(100/$custom['grid']['nbrItems'])*$i."%;
        }
    ";
}
$return .= "}";
$return .= "@media all and (max-width: 1080px) {";
for($i = 0; $i <= $custom['grid']['nbrItems']; $i++) {
    $return .= "
        .col-md-".$i." {
            width: ".(100/$custom['grid']['nbrItems'])*$i."%;
        }
    ";
}
$return .= "}";
return $return;