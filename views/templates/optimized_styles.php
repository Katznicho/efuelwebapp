<?php

/***
 * Loading the relevant styleSheet for each view of your application
 * @author ThinkXSoftware
 * 
 * **/


/**
 * 
 * mandatory css and head links
 */

?>
<!-- google fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- template css -->
<link rel="stylesheet" href="/efuelwebapp/plugins/fontawesome-free/css/all.css">

<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="/efuelwebapp/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="/efuelwebapp/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

<link rel="stylesheet" href="/efuelwebapp/dist/css/adminlte.min.css">

<?php
/**
 * end mandatory css and head links
 * **/

// create filters for each page
/**
 *@var $script_name current executing script or view file loading 
 **/
$script_name =  trim(strtolower($_SERVER['SCRIPT_NAME']));

$batches = array(
    'tablePageScripts' => [
        '/efuelwebapp/views/users/index.php',
        '/efuelwebapp/views/roles/index.php',
        '/efuelwebapp/views/stage/index.php',
        '/efuelwebapp/views/stage/activeStages.php',
        '/efuelwebapp/views/fuelstation/index.php',
        '/efuelwebapp/views/bodauser/index.php',
        '/efuelwebapp/views/packages/index.php',
		'/efuelwebapp/views/deposits/index.php',
		'/efuelwebapp/views/payments/index.php',
		'/efuelwebapp/views/territories/index.php',
		'/efuelwebapp/views/fuelagent/index.php',
		'/efuelwebapp/views/stage/territoryStages.php',








    ],
    'formPageScripts' => [
		'/efuelwebapp/views/territories/create.php',
		'/efuelwebapp/views/territories/edit.php',

	
	],

    'detailPageScripts' => []
);

if (in_array($script_name, $batches['tablePageScripts'])) {
?>

    <!-- DataTables -->
    <link rel="stylesheet" href="/efuelwebapp/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/efuelwebapp/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/efuelwebapp/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<?php
}

if (in_array($script_name, $batches['detailPageScripts'])) {
?>

<!-- load detail support scripts -->

<?php
}
if (in_array($script_name, $batches['formPageScripts'])) {
?>

 <!-- load form supporting css and links -->
 <link rel="stylesheet" href=" /efuelwebapp/plugins/select2/css/select2.css">

<link rel="stylesheet" href=" /efuelwebapp/plugins/select2-bootstrap4-theme/select2-bootstrap4.css">


<?php
}

if($script_name == "/efuelwebapp/views/dashboard/index.php"){

?>
<style>
		.welcome-text,
		.welcome-sub-text {
			font-family: "Manrope", sans-serif !important;
			font-style: normal !important;
			font-weight: normal !important;
			font-size: 28px !important;
			line-height: 38px !important;
			color: #8D8D8D !important;
			margin-bottom: 10px !important;
		}

		.home__top {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		.statistics-details {
			margin-bottom: 48px;
		}

		.statistics-details .statistics-title {
			font-style: normal;
			font-weight: 500;
			font-size: 13px;
			line-height: 18px;
			color: #8D8D8D;
			margin-bottom: 4px;
		}

		.statistics-details .rate-percentage {
			font-style: normal;
			font-weight: bold;
			font-size: 26px;
			line-height: 36px;
			color: #000000;
			margin-bottom: 0;
		}

		.home__details {
			display: flex;
			justify-content: center;
			align-items: center;
			padding: 20px;
		}


		.home__content {
			height: 150vh !important;
			padding: 20px 40px !important;
			;
		}

	

		.home__eachCardDetails {
			padding-top: 20px !important;
			padding-left: 20px !important;
			padding-right: 20px !important;

		}
	</style>


<?php
}

?>

<style>

.style_button {
            background: #1c478e !important;
            color: #fff;
            width: 100% !important;
            border: none !important;
            height: 40px !important;
            cursor: pointer;
            border-radius: 10px;
        }
</style>