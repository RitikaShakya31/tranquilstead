<?php include('includes/header.php'); ?>

<body data-sidebar="dark">
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->
    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php include('includes/top-header.php'); ?>
        <?php include('includes/menu.php'); ?>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h2 class="mb-sm-0 "><?= $title ?></h2>
                                <a href="<?= base_url("categoryAdd"); ?>" class="btn btn-success"><i
                                        class="fa fa-plus"></i> Add</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Sr no.</th>
                                                <th>Catogory Name</th>
                                                <th>Catogory Sub Name </th>
                                                <th style="width: 20%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($category_all) {
                                                $i = 0;
                                                foreach ($category_all as $all) {
                                                    $id = encryptId($all['category_id']);
                                                    ?>
                                                    <tr>
                                                        <td><?= ++$i; ?></td>
                                                        <td><?= $all['category_name'] ?></td>
                                                        <td><?= $all['sub_name'] ?></td>
                                                        <td>
                                                            <a href="<?= base_url("categoryAdd?id=$id"); ?>"
                                                                class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                                                            <a onclick="return confirm('Are you want to sure ?')"
                                                                href="<?= base_url("categoryAdd?dID=$id"); ?>"
                                                                class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('includes/footer.php') ?>
    </div>
    <!-- end main content-->
    </div>
    <?php include('includes/footer-link.php'); ?>
</body>

</html>