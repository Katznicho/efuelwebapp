<?php

/**
 * Header of the application
 * @author ThinkxSoftware
 * **/
include_once '../templates/SecurePageHeader.php';
/***
 * reusable components to inject code into the template
 * */
include_once '../templates/Components.php';

startContent();

// code here




breadCrumbs(['title' => 'Looked Up User', 'sub_title' => 'Loans', 'previous' => 'Mojaloop', 'previous_action' => 'partylookup.php']);

?>

<div class="row">
    <div class="col-12">
        <!--table-->
        <!-- /.card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User Details</h3>
                </br>
                <ul>
                    <li>Step 1: PartyLookUp</li>
                    <li>Step 2: Quote</li>
                    <li>Step 3: Transfer</li>
                </ul>
                
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                 
                <!-- add a button to make a party look up -->
                <a class="btn btn-success" href="./partylookup.php"> Party Look Up
                </a>
                
            </div>
            <!-- /.card -->


            <!-- /.card -->
            <!--table-->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>


<?php


endContent();

/**
 * footer of the application
 * */
include_once '../templates/footer.php';

/**
 * custom page javascript
 * **/
?>








<?php
endPage();
