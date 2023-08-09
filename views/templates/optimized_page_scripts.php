<?php

/***
 * Loading the relevant javascript for each view of your application
 * @author ThinkXSoftware
 * 
 * **/


/**
 * 
 * mandatory javascript
 */

?>
<!-- jQuery -->
<script src="/efuelwebapp/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/efuelwebapp/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="/efuelwebapp/dist/js/adminlte.min.js"></script>
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
        '/efuelwebapp/views/stage/territorystages.php',

    ],
    'formPageScripts' => [],

    'detailPageScripts' => []
);

if (in_array($script_name, $batches['tablePageScripts'])) {
?>

    <!-- DataTables -->
    <script src="/efuelwebapp/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/efuelwebapp/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/efuelwebapp/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/efuelwebapp/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/efuelwebapp/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/efuelwebapp/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/efuelwebapp/plugins/jszip/jszip.min.js"></script>
    <script src="/efuelwebapp/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/efuelwebapp/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/efuelwebapp/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/efuelwebapp/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/efuelwebapp/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<?php
}

if (in_array($script_name, $batches['detailPageScripts'])) {
?>

    <!-- load detail support scripts -->

<?php
}
if (in_array($script_name, $batches['formPageScripts'])) {
?>

    <!-- load form supporting scripts -->

<?php
}
