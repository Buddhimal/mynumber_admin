<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Clinics</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Clinic list</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Registered Clinic list</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="tbl_clinic_list" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Clinic Name</th>
                                        <th>Email</th>
                                        <th>Device mobile</th>
                                        <th>Contact mobile</th>
                                        <th>Web</th>
                                        <th>City</th>
                                        <th>Address</th>
                                        <th>District</th>
                                        <th>Province</th>
                                        <th>Location</th>
                                        <th>Active Status</th>
                                        <th>Delete Status</th>
                                        <th>Verify Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($clinic_list->result() as $clinic) { ?>
                                        <tr>
                                            <td><?php echo $clinic->clinic_name ?></td>
                                            <td><?php echo $clinic->email ?></td>
                                            <td><?php echo $clinic->device_mobile ?></td>
                                            <td><?php echo $clinic->contact_mobile ?></td>
                                            <td><?php echo $clinic->web ?></td>
                                            <td><?php echo $clinic->city ?></td>
                                            <td><?php echo $clinic->street_address . ' ' . $clinic->address_line_ii ?></td>
                                            <td><?php echo $clinic->district ?></td>
                                            <td><?php echo $clinic->province ?></td>
                                            <td><?php echo '' ?></td>
                                            <td><?php echo '' ?></td>
                                            <td><?php echo '' ?></td>
                                            <td><?php echo '' ?></td>

                                        </tr>
                                    <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
    <!-- /.content-wrapper -->

    <script>
        $(function () {
            $("#tbl_clinic_list").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>



