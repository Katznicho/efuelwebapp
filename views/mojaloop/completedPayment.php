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




breadCrumbs(['title' => 'Majoloop Demo', 'sub_title' => 'Payment Status', 'previous' => 'Mojaloop', 'previous_action' => 'partylookup.php']);

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
                    <li class="current-step">Step 3: Approved</li>
                </ul>

            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <?php
                // Check if the response is stored in the session
                if (isset($_SESSION['completedPaymentDetails'])) {
                    $response = $_SESSION['completedPaymentDetails'];

                    // Display the response
                    echo "Response from completedPayment:<br>";
                    echo "<pre>" . htmlspecialchars($response) . "</pre>";

                    // Clear the session variable to avoid displaying the same response again
                    // unset($_SESSION['response']);
                } else {
                    echo " No completed Payment response available.";
                }


                ?>

                <h1>User Friendly</h1>
                <?php
                // Check if the response is stored in the session
                if (isset($_SESSION['completedPaymentDetails'])) {
                    $response = json_decode($_SESSION['completedPaymentDetails'], true);

                    // Display the response in a user-friendly format
                    echo "<h4>Response from the Approved Payment:</h4>";
                    echo "<ul>";
                    echo "<li><strong>Transaction ID:</strong> " . $response['transactionStatus']['transactionId'] . "</li>";
                    echo "<li><strong>Transaction Request State:</strong> " . $response['transactionStatus']['transactionRequestState'] . "</li>";
                    echo "<li><strong>Transaction State:</strong> " . $response['transactionStatus']['transactionState'] . "</li>";
                    // Add more information here if needed
                    echo "</ul>";

                    // Clear the session variable to avoid displaying the same response again
                    
                } else {
                    echo "No Approved payment response available.";
                }
                ?>



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
