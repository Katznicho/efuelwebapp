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




breadCrumbs(['title' => 'Majoloop Demo', 'sub_title' => 'PartyLookUp', 'previous' => 'Mojaloop', 'previous_action' => 'partylookup.php']);

?>

<div class="row">
    <div class="col-12">
        <!--table-->
        <!-- /.card -->
        <div class="card">
            <style>
                .current-step {
                    font-weight: bold;
                    /* Make the current step bold */
                    color: blue;
                    /* Change the color of the current step text */
                }
            </style>
            <div class="card-header">
                <h3 class="card-title">We are demonstrating how to use mojaloop to make a payment in 3 steps</h3>
                </br>
                <ul>
                    <li>Step 1: PartyLookUp</li>
                    <li class="current-step">Step 2: Initiate Payment</li>
                    <li>Step 3: Transfer</li>
                </ul>

            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <?php
                // Check if the response is stored in the session
                if (isset($_SESSION['partyLookupResponse'])) {
                    $partyLookupResponse = $_SESSION['partyLookupResponse'];

                    // Display the response
                    echo "Response from partyLookup:<br>";
                    echo "<pre>" . htmlspecialchars($partyLookupResponse) . "</pre>";

                    // Clear the session variable to avoid displaying the same response again
                    // unset($_SESSION['partyLookupResponse']);
                } else {
                    echo "No partyLookup response available.";
                }

                
                ?>

                <h1>User Friendly</h1>
                <?php
                    if (isset($_SESSION['partyLookupResponse'])) {
                        $partyLookupResponse = json_decode($_SESSION['partyLookupResponse'], true);

                        // Display the response in a user-friendly format
                        echo "<h4>Response from partyLookup:</h4>";
                        echo "<ul>";
                        echo "<li><strong>Current State:</strong> " . $partyLookupResponse['currentState'] . "</li>";
                        echo "<li><strong>Party Name:</strong> " . $partyLookupResponse['party']['name'] . "</li>";
                        echo "<li><strong>Party ID Type:</strong> " . $partyLookupResponse['party']['partyIdInfo']['partyIdType'] . "</li>";
                        echo "<li><strong>Party Identifier:</strong> " . $partyLookupResponse['party']['partyIdInfo']['partyIdentifier'] . "</li>";
                        // Add more information here if needed
                        echo "</ul>";

                        // Clear the session variable to avoid displaying the same response again
                        //unset($_SESSION['partyLookupResponse']);
                    } else {
                        echo "No partyLookup response available.";
                    }
                ?>

                <div>
                <a class="btn btn-success" href="./initiate_payment.php"> Initiate Payment
                </a>
                </div>

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
