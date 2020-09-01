<?php
// This script and data application were generated by AppGini 5.62
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/residence_and_rental_history.php");
	include("$currDir/residence_and_rental_history_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('residence_and_rental_history');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "residence_and_rental_history";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`residence_and_rental_history`.`id`" => "id",
		"IF(    CHAR_LENGTH(`applicants_and_tenants1`.`first_name`) || CHAR_LENGTH(`applicants_and_tenants1`.`last_name`), CONCAT_WS('',   `applicants_and_tenants1`.`first_name`, ' ', `applicants_and_tenants1`.`last_name`), '') /* Tenant */" => "tenant",
		"`residence_and_rental_history`.`address`" => "address",
		"`residence_and_rental_history`.`landlord_or_manager_name`" => "landlord_or_manager_name",
		"`residence_and_rental_history`.`landlord_or_manager_phone`" => "landlord_or_manager_phone",
		"CONCAT('$', FORMAT(`residence_and_rental_history`.`monthly_rent`, 2))" => "monthly_rent",
		"if(`residence_and_rental_history`.`duration_of_residency_from`,date_format(`residence_and_rental_history`.`duration_of_residency_from`,'%m/%d/%Y'),'')" => "duration_of_residency_from",
		"if(`residence_and_rental_history`.`to`,date_format(`residence_and_rental_history`.`to`,'%m/%d/%Y'),'')" => "to",
		"`residence_and_rental_history`.`reason_for_leaving`" => "reason_for_leaving",
		"`residence_and_rental_history`.`notes`" => "notes"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`residence_and_rental_history`.`id`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => 5,
		6 => '`residence_and_rental_history`.`monthly_rent`',
		7 => '`residence_and_rental_history`.`duration_of_residency_from`',
		8 => '`residence_and_rental_history`.`to`',
		9 => 9,
		10 => 10
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`residence_and_rental_history`.`id`" => "id",
		"IF(    CHAR_LENGTH(`applicants_and_tenants1`.`first_name`) || CHAR_LENGTH(`applicants_and_tenants1`.`last_name`), CONCAT_WS('',   `applicants_and_tenants1`.`first_name`, ' ', `applicants_and_tenants1`.`last_name`), '') /* Tenant */" => "tenant",
		"`residence_and_rental_history`.`address`" => "address",
		"`residence_and_rental_history`.`landlord_or_manager_name`" => "landlord_or_manager_name",
		"`residence_and_rental_history`.`landlord_or_manager_phone`" => "landlord_or_manager_phone",
		"CONCAT('$', FORMAT(`residence_and_rental_history`.`monthly_rent`, 2))" => "monthly_rent",
		"if(`residence_and_rental_history`.`duration_of_residency_from`,date_format(`residence_and_rental_history`.`duration_of_residency_from`,'%m/%d/%Y'),'')" => "duration_of_residency_from",
		"if(`residence_and_rental_history`.`to`,date_format(`residence_and_rental_history`.`to`,'%m/%d/%Y'),'')" => "to",
		"`residence_and_rental_history`.`reason_for_leaving`" => "reason_for_leaving",
		"`residence_and_rental_history`.`notes`" => "notes"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`residence_and_rental_history`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`applicants_and_tenants1`.`first_name`) || CHAR_LENGTH(`applicants_and_tenants1`.`last_name`), CONCAT_WS('',   `applicants_and_tenants1`.`first_name`, ' ', `applicants_and_tenants1`.`last_name`), '') /* Tenant */" => "Tenant",
		"`residence_and_rental_history`.`address`" => "Address",
		"`residence_and_rental_history`.`landlord_or_manager_name`" => "Landlord/manager name",
		"`residence_and_rental_history`.`landlord_or_manager_phone`" => "Landlord/manager phone",
		"`residence_and_rental_history`.`monthly_rent`" => "Monthly rent",
		"`residence_and_rental_history`.`duration_of_residency_from`" => "Duration of residency from",
		"`residence_and_rental_history`.`to`" => "to",
		"`residence_and_rental_history`.`reason_for_leaving`" => "Reason for leaving",
		"`residence_and_rental_history`.`notes`" => "Notes"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`residence_and_rental_history`.`id`" => "id",
		"IF(    CHAR_LENGTH(`applicants_and_tenants1`.`first_name`) || CHAR_LENGTH(`applicants_and_tenants1`.`last_name`), CONCAT_WS('',   `applicants_and_tenants1`.`first_name`, ' ', `applicants_and_tenants1`.`last_name`), '') /* Tenant */" => "tenant",
		"`residence_and_rental_history`.`address`" => "address",
		"`residence_and_rental_history`.`landlord_or_manager_name`" => "landlord_or_manager_name",
		"`residence_and_rental_history`.`landlord_or_manager_phone`" => "landlord_or_manager_phone",
		"CONCAT('$', FORMAT(`residence_and_rental_history`.`monthly_rent`, 2))" => "monthly_rent",
		"if(`residence_and_rental_history`.`duration_of_residency_from`,date_format(`residence_and_rental_history`.`duration_of_residency_from`,'%m/%d/%Y'),'')" => "duration_of_residency_from",
		"if(`residence_and_rental_history`.`to`,date_format(`residence_and_rental_history`.`to`,'%m/%d/%Y'),'')" => "to",
		"`residence_and_rental_history`.`reason_for_leaving`" => "reason_for_leaving",
		"`residence_and_rental_history`.`notes`" => "notes"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'tenant' => 'Tenant');

	$x->QueryFrom = "`residence_and_rental_history` LEFT JOIN `applicants_and_tenants` as applicants_and_tenants1 ON `applicants_and_tenants1`.`id`=`residence_and_rental_history`.`tenant` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = false;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 0;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "residence_and_rental_history_view.php";
	$x->RedirectAfterInsert = "residence_and_rental_history_view.php?SelectedID=#ID#";
	$x->TableTitle = "Residence and rental history";
	$x->TableIcon = "resources/table_icons/document_comment_above.png";
	$x->PrimaryKey = "`residence_and_rental_history`.`id`";

	$x->ColWidth   = array(  180, 120, 100, 80, 100, 80, 120);
	$x->ColCaption = array("Address", "Landlord/manager name", "Landlord/manager phone", "Monthly rent", "Duration of residency from", "to", "Reason for leaving");
	$x->ColFieldName = array('address', 'landlord_or_manager_name', 'landlord_or_manager_phone', 'monthly_rent', 'duration_of_residency_from', 'to', 'reason_for_leaving');
	$x->ColNumber  = array(3, 4, 5, 6, 7, 8, 9);

	// template paths below are based on the app main directory
	$x->Template = 'templates/residence_and_rental_history_templateTV.html';
	$x->SelectedTemplate = 'templates/residence_and_rental_history_templateTVS.html';
	$x->TemplateDV = 'templates/residence_and_rental_history_templateDV.html';
	$x->TemplateDVP = 'templates/residence_and_rental_history_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->ShowRecordSlots = 0;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `residence_and_rental_history`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='residence_and_rental_history' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `residence_and_rental_history`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='residence_and_rental_history' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`residence_and_rental_history`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: residence_and_rental_history_init
	$render=TRUE;
	if(function_exists('residence_and_rental_history_init')){
		$args=array();
		$render=residence_and_rental_history_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: residence_and_rental_history_header
	$headerCode='';
	if(function_exists('residence_and_rental_history_header')){
		$args=array();
		$headerCode=residence_and_rental_history_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: residence_and_rental_history_footer
	$footerCode='';
	if(function_exists('residence_and_rental_history_footer')){
		$args=array();
		$footerCode=residence_and_rental_history_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>