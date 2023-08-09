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

if (!can('view-users')) header('Location:../Errors/unAuthorized.php');

breadCrumbs(['title' => 'Over All UnPaid Loans', 'sub_title' => 'details', 'previous' => 'Dashboard', 'previous_action' => '../dashboard/']);


startContent();


try {

    $sql = "SELECT bodauser.bodaUserName , bodauser.bodaUserPhoneNumber, bodauser.stageId, loan.loanAmount , loan.loanInterest, loan.created_at, loan.updated_at, loan.status, loan.loan_penalty  FROM bodauser INNER JOIN loan ON bodauser.bodaUserPhoneNumber = loan.boadUserId WHERE  loan.status=1";

    $details = $dbAccess->selectQuery($sql);
} catch (\Throwable $th) {
    //throw $th;
    var_dump($th->getMessage());
    die("an error ocuured");
}


?>


<div class="row">
    <div class="col-12">
        <!--table-->
        <!-- /.card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Details Table</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Boda Names</th>
                            <th>Boda User Phone Number</th>
                            <th>Stage</th>
                            <th>Loan Amount</th>
                            <th>Loan Interest</th>
                            <th>Loan Penalty</th>
                            <th>Loan Status</th>
                            <th>Loan Taken On</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($details as $row) {


                        ?>
                            <tr>
                                <td><?= $row['bodaUserName'] ?></td>
                                <td><?= $row['bodaUserPhoneNumber'] ?></td>

                                <td>
                                    <?= $dbAccess->select("stage", ['stageName'], ['stageId' => $row['stageId']])[0]['stageName'] ?>
                                </td>
                                <td><?= $row['loanAmount'] ?></td>
                                <td><?= $row['loanInterest'] ?></td>
                                <td><?= $row['loan_penalty'] ?></td>
                                <td>
                                    <?php
                                    $createdAt = date('Y-m-d', strtotime($row['created_at']));
                                    $currentDate = date('Y-m-d');

                                    if ($createdAt < $currentDate) {
                                        echo "<span class='badge badge-danger'>Overdue</span>";
                                    } else {
                                        echo "<span class='badge badge-success'>Unpaid</span>";
                                    }
                                    ?>


                                </td>
                                <td><?= $row['created_at'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>



                    </tbody>

                </table>
            </div>
            <!-- /.card -->


            <!-- /.card -->
            <!--table-->
        </div>
        <!-- /.col -->
    </div>
</div>


<?php
endContent();

//include_once "../templates/optimized_page_scripts.php";

/**
 * footer of the application
 * */
include_once '../templates/footer.php';

/**
 * custom page javascript
 * **/
?>
<script src="/creditpluswebapp/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/creditpluswebapp/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/creditpluswebapp/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/creditpluswebapp/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/creditpluswebapp/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/creditpluswebapp/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/creditpluswebapp/plugins/jszip/jszip.min.js"></script>
<script src="/creditpluswebapp/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/creditpluswebapp/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/creditpluswebapp/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/creditpluswebapp/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/creditpluswebapp/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<?php

endPage();