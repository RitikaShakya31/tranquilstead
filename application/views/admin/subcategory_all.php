<?php include('includes/header.php'); ?>
<style>
    .dots-menu {
        cursor: pointer;
        font-size: 20px;
        font-weight: bold;
        display: inline-block;
        user-select: none;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        right: -68px;
        /* Adjust for alignment */
        top: 20px;
        /* Adjust for vertical spacing */
        background-color: #f9f9f9;
        min-width: 90px;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 10px 15px;
        text-decoration: none;
        display: block;
        font-size: 12px;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }
</style>
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
                        <a href="<?= base_url("subCategoryAdd"); ?>" class="btn btn-success"><i class="fa fa-plus"></i>
                            Add</a>
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
                                        <th>Sr No.</th>
                                        <th>SubCategory Name</th>
                                        <th>Category Name</th>
                                        <th>More</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($sub_category) {
                                        $i = 0;
                                        foreach ($sub_category as $item) {
                                            $i = $i + 1;
                                            $id = encryptId($item['sub_category_id']);
                                            $category = getSingleRowById('category', "category_id = '" . $item['category_id'] . "'");
                                            ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= ucwords($item['sub_category_name']) ?> </td>
                                                <td><?= ucwords($category['category_name']) ?></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <span class="dots-menu" title="More Options">⋮</span>
                                                        <div class="dropdown-content">
                                                            <a
                                                                href="<?php echo base_url(); ?>subCategoryAdd?id=<?php echo $id; ?>"><i
                                                                    class="fa fa-edit"></i> Edit </a>
                                                            <a href="<?= base_url("subCategoryAdd?dID=$id"); ?>"
                                                                onclick="return confirm('Are you sure ?')"><i
                                                                    class="fa fa-trash dlt"></i> Delete </a>
                                                        </div>
                                                    </div>
                                                </td>
                                              
                                            </tr>
                                            <?php
                                        }
                                    } ?>
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