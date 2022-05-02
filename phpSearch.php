<?php include("includes/header.php")?>
<?php

$con=mysqli_connect(
  'localhost',
  'root',
  '123456',
  'ecomm'
);

$search = $_POST['search'];
$qq=$search;


?>
<div class="container">
        <div class="row">
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
                              <form action="phpSearch.php" method="post">
                             Search <input type="text" name="search"><br><input type ="submit">
                                    </form>


                
                                <?php 
                                  
                          
                                    if($search)
                                    {
                                  
                                        $sql = "select * from task where title like '%$search%'";
                                        $query_run = mysqli_query($con, $sql);

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
                    <form action="export.php" method="post">
                             Export <input type="text" name="s" value="<?php echo $search;?>"><br><input type ="submit">
                                    </form>


                </div>
            </div>
            </div>
            </div>


<?php
$con->close();
?>
 <?php include("includes/footer.php")?>