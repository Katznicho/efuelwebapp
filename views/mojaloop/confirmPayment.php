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
                    <li>Step 2: Initiate Payment</li>
                    <li class="current-step">Step 3: Transfer</li>
                </ul>

            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <?php
                // Check if the response is stored in the session
                if (isset($_SESSION['initiatePayment'])) {
                    $response = $_SESSION['initiatePayment'];

                    // Display the response
                    echo "Response from partyLookup:<br>";
                    echo "<pre>" . htmlspecialchars($response) . "</pre>";

                    // Clear the session variable to avoid displaying the same response again
                    // unset($_SESSION['response']);
                } else {
                    echo "initiatePayment response available.";
                }


                ?>

                <h1>User Friendly</h1>
                <?php
                // Check if the response is stored in the session
                if (isset($_SESSION['initiatePayment'])) {
                    $response = json_decode($_SESSION['initiatePayment'], true);

                    // Display the response in a user-friendly format
                    echo "<h4>Response from Initiated Payment:</h4>";
                    echo "<ul>";
                    echo "<li><strong>Current State:</strong> " . $response['currentState'] . "</li>";
                    echo "<li><strong>Authorization Request ID:</strong> " . $response['authorization']['authorizationRequestId'] . "</li>";
                    echo "<li><strong>Transaction Request ID:</strong> " . $response['authorization']['transactionRequestId'] . "</li>";
                    echo "<li><strong>Transfer Amount:</strong> " . $response['authorization']['transferAmount']['amount'] . " " . $response['authorization']['transferAmount']['currency'] . "</li>";
                    // Add more information here if needed
                    echo "</ul>";

                    // Clear the session variable to avoid displaying the same response again
                    //unset($_SESSION['initiatePayment']);
                } else {
                    echo "No initiated payment response available.";
                }
                ?>

                <form action="./complete_transaction.php" method="post">
                    <div>
                        <h4>Enter PIN to Approve Payment:</h4>
                        <input type="password" id="pinInput" name="pin" placeholder="Enter PIN" required>
                        <button class="btn btn-success" id="approveButton" disabled>Approve Payment</button>
                    </div>
                </form>

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

<script>
    // Listen for input in the PIN field
    document.getElementById('pinInput').addEventListener('input', function() {
        const pinValue = this.value.trim();
        const approveButton = document.getElementById('approveButton');

        // Enable the button if the PIN is not empty
        if (pinValue !== '') {
            approveButton.removeAttribute('disabled');
        } else {
            approveButton.setAttribute('disabled', 'disabled');
        }
    });
</script>









<?php
endPage();
