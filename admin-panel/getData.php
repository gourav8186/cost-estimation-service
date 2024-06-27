<?php
$session 		= $_SESSION['ADMINUSER'];
$activePanel 	= $pages['page'];

if ($session != "") {
	$pagePath = 'includes/home.php';

	switch ($activePanel) {
		
		case CHANGE_PASSWORD	    :			$filePath 	= 'includes/change-password.php';
												$metaTitle	= 'Change Password';
												break;

		case LOGOUT				    :			$pagePath 	= 'includes/logout.php';
												$metaTitle	= 'Logout';
												break;

		case ADD_SLIDER			    :			$filePath 	= 'includes/add-slider.php';
												$metaTitle	= 'Add Slider';
												break;

		case VIEW_SLIDER		    :			$filePath 	= 'includes/view-slider.php';
												$metaTitle	= 'View Slider';
												break;

		case ADD_MOBILE_COMPANY	    :			$filePath 	= 'includes/add-mobile-company.php';
												$metaTitle	= 'Add Mobile Company';
												break;

		case VIEW_MOBILE_COMPANY    :			$filePath 	= 'includes/view-mobile-company.php';
												$metaTitle	= 'View Mobile Company';
												break;

		case ADD_MODEL		        :			$filePath 	= 'includes/add-model.php';
												$metaTitle	= 'Add Model';
												break;

		case VIEW_MODEL		:					$filePath 	= 'includes/view-model.php';
												$metaTitle	= 'View Model';
												break;

		case ADD_SERIES		:					$filePath 	= 'includes/add-series.php';
												$metaTitle	= 'Add Series';
												break;

		case VIEW_SERIES		:				$filePath 	= 'includes/view-series.php';
												$metaTitle	= 'View Series';
												break;

		case ADD_SPAREPARTS		:				$filePath 	= 'includes/add-sparepart.php';
												$metaTitle	= 'Add Sparepart';
												break;

		case VIEW_SPAREPARTS		:				$filePath 	= 'includes/view-spareparts.php';
												$metaTitle	= 'View Spareparts';
												break;

		case ADD_ACCESSORIES			:		$filePath 	= 'includes/add-accessories.php';
												$metaTitle	= 'Add Accessories';
												break;

		case VIEW_ACCESSORIES			:		$filePath 	= 'includes/view-accessories.php';
												$metaTitle	= 'View Accessories';
												break;

		case ADD_CENTER					:		$filePath 	= 'includes/add-center.php';
												$metaTitle	= 'Add Service Center';
												break;

		case VIEW_CENTER				:		$filePath 	= 'includes/view-center.php';
												$metaTitle	= 'View Service Center';
												break;

		case ADD_CHARGES					:	$filePath 	= 'includes/add-charges.php';
												$metaTitle	= 'Add Charges';
												break;

		case VIEW_CHARGES				:		$filePath 	= 'includes/view-charges.php';
												$metaTitle	= 'View Charges';
												break;

		case USERS						:		$filePath 	= 'includes/users.php';
												$metaTitle	= 'Users';
												break;

		case INQUIRY			:				$filePath 	= 'includes/inquiry.php';
												$metaTitle	= 'Inquiry';
												break;
		case FEEDBACK			:				$filePath 	= 'includes/feedback.php';
												$metaTitle	= 'Feedback';
												break;

		default					:				$filePath 	= 'includes/dashboard.php';
												$metaTitle	= 'Dashboard';
												break;	
	}
} else {
	switch ($activePanel) {
		default					:			$pagePath 	= 'includes/login.php';
											$metaTitle	= 'Login';
											break;
	}
}
?>