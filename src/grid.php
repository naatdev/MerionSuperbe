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
}
";
for($i = 0; $i <= $custom['grid']['nbrItems']; $i++) {
    $return .= "
        .col-lg-".$i." {
            width: ".(100/$custom['grid']['nbrItems'])*$i."%;
        }
    ";
}
return $return;