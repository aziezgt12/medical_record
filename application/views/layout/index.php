<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>SIM-KUPM</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico">

    <?= $_stylesheet ?>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


</head>

<body>


    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="<?= base_url() ?>" class="logo">
                <img src="<?= base_url('assets/images/logo-kpm.png') ?>" style="width: 150px; padding-top: 15px;"/>
                    <!-- <span class="logo-light">
                        <i class="mdi mdi-camera-control"></i> Stexo
                    </span>
                    <span class="logo-sm">
                        <i class="mdi mdi-camera-control"></i>
                    </span> -->
                </a>
            </div>

            <?= $_navigation ?>

        </div>
        <!-- Top Bar End -->

        <?= $_menu ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <h4 class="page-title"><?= $_titlePage ?></h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);"></a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);"></a></li>
                                    <li class="breadcrumb-item active"></li>
                                </ol>
                            </div>
                        </div> <!-- end row -->
                    </div>
                    <!-- end page-title -->




                    <?= $_script ?>

                    <?= $_content ?>



                </div>
                <!-- container-fluid -->

            </div>
            <!-- content -->

            <footer class="footer">
                © KUPM <span class="d-none d-sm-inline-block"> - 2023 <i class="mdi mdi-checkbox-blank"></i> by dr. Ilum Anam, Sp.PD-KGEH</span>.
            </footer>

        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->




</body>

</html>