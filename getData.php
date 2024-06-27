<?php
	$activePanel = $pages['page'];


	switch ($activePanel) {
		
		case  SPARE_PARTS 					:	$filename = "includes/spareparts.php";
												$titleName = "Spare Parts";
												break;
		case  GET_ESTIMATE 					:	$filename = "includes/getEstimate.php";
												$titleName = "Get Estimate";
												break;
		case  ACCESSORIES 					:	$filename = "includes/accessories.php";
												$titleName = "Accessories";
												break;
		case  SERVICE 						:	$filename = "includes/service-center.php";
												$titleName = "Service Center";
												break;

		default								:	$filename = "includes/home.php";
												$titleName = "Home";
												break;
	}
?>