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


?>
    <div class="card container-fluid col-md-12 col-12 col-lg-12">
        <div class="display-4 text-muted text-center">Un Authorized Access</div>
        <p class="text-center my-1">You do not have the permissions</p>
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
endPage();