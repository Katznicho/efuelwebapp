<?php
session_start();
$_SESSION['bool'] =  true;
//unset($_SESSION["success"]);
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Fuel Users</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/creditpluswebapp/plugins/fontawesome-free/css/all.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/creditpluswebapp/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/creditpluswebapp/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/creditpluswebapp/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/creditpluswebapp/dist/css/adminlte.min.css">

    <style>
        .style_button {
            background: #657836 !important;
            color: #fff;
            width: 100% !important;
            border: none !important;
            height: 40px !important;
            cursor: pointer;
            border-radius: 10px;
        }

        .farmer__filter {
            display: flex !important;
            align-items: center !important;
            justify-content: space-evenly !important;
        }

        .platform {
            display: none !important;
        }

        .content-wrapper {
            position: relative !important;
        }

        .image__remove {
            position: absolute !important;
            right: 30px !important;
            top: 10px !important;
            cursor: pointer;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php
        include("../../utils/dbaccess.php");
        include("../navbar/navbar.php");
        include("../sidebar.php");

        $dbAccess =  new DbAccess();

        ?>
        <!-- Main Sidebar Container -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!--any wrong info-->

            <?php if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success m-4" id="removeAlert">
                    <p><?= $_SESSION['success']; ?></p>
                    <img src="../../dist/img/remove.png" class="image__remove" alt="cross image" height="20px" width="20px">

                </div>

            <?php }
            unset($_SESSION['success']);
            ?>



            <!--any wrong info-->

            <!-- /.card -->
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Active Fuel Stations</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                                <li class="breadcrumb-item active">Active Fuel Stations</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <?php
                    // $dbAccess->getConnection();
                    // $results =  json_encode($dbAccess->select("bodauser"));
                    //var_dump($results[0]['bodaUserName']);

                    ?>

                    <div class="row">
                        <div class="col-12">
                            <!--table-->
                            <!-- /.card -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Active Fuel Station Table</h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th> Name</th>
                                                <th>Contact Person</th>
                                                <th>Contact Address</th>
                                                <th>Contact Phone Number</th>
                                                <th>Fuel Station Status</th>
                                                <th>Activation Status</th>
                                                <th width="130px">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>

                                    </table>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->


                                <!-- /.card -->
                                <!--table-->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include_once("../footer/footer.php"); ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="/creditpluswebapp/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->

    <script src="/creditpluswebapp/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
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
    <!-- AdminLTE App -->
    <script src="/creditpluswebapp/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/creditpluswebapp/dist/js/demo.js"></script>

    <!--hide alert--->
    <script type="text/javascript">
        $(function() {
            $('.image__remove').click(function() {
                //alert('clicked')
                // $("#content-wrap").addClass('platform');
                $("#removeAlert").addClass('platform');

            })
        })
    </script>
    <!--hide alert-->

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "fnCreatedRow": function(nRow, aData, iDataIndex) {
                    $(nRow).attr('id', aData[0]);
                },
                'serverSide': 'true',
                'processing': 'true',
                'paging': 'true',
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                'order': [],
                'ajax': {
                    'url': './serversideactivefuelstation.php',
                    'type': 'post',
                },
                "columnDefs": [{
                    'target': [5],
                    'orderable': false,
                }]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>





</body>

</html>