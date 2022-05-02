<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Funda Of Web IT</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>How to make Search box & filter data in HTML Table from Database in PHP MySQL </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="searc" required value="<?php if(isset($_GET['searc'])){echo $_GET['searc']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                             <th>Title</th>
                             <th>Description</th>
                             <th>Created At</th>
                            
                             </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con=mysqli_connect(
                                      'localhost',
                                      'root',
                                      '123456',
                                      'ecomm'
                                    );
                                    $query = "select * from task ";
                                    $query_run = mysqli_query($con, $query);

                                    if((mysqli_num_rows($query_run) > 0) && (!isset($_GET['searc'])) )
                                    {
                                        foreach($query_run as $items)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $items['title']; ?></td>
                                                <td><?= $items['description']; ?></td>
                                                <td><?= $items['created_at']; ?></td>
                                               
                                            </tr>
                                            <?php
                                        }
                                    }

                                    if(isset($_GET['searc']))
                                    {
                                        $filtervalues = $_GET['searc'];
                                        $query = "select * from task where title like '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['title']; ?></td>
                                                    <td><?= $items['description']; ?></td>
                                                    <td><?= $items['created_at']; ?></td>
                                                   
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>