
<?php include("db.php");?>
<?php include("includes/header.php")?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <?php if(isset($_SESSION['message'])){  //isset 判定$_SESSION[]是否有值 ?> 
        <div class="alert alert-<?=$_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
          <sapn aria-hidden="true">&times;</sapn>
        </button>                                     
        </div>                               
       <?php session_unset();} ?>
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="title" class="form-controll"
            placeholder="Task Title" autofocus>   <!--autofacus 讓他有箭頭-->
          </div>                                                     
          <br/>
          <div class="form-group">
            <textarea name="description"  rows="2" class="form-controll"
            placeholder="Task Description"></textarea>
          </div>
          <input type="submit" class="btn btn-success btn-block"
          name="save_task" value="Save Task">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <form action="phpSearch.php" method="post">
            Search <input type="text" name="search"><br>
          <?php
          $query="SELECT * FROM task";
          $result_tasks=mysqli_query($conn,$query);  //mysqli_query() 查詢數據
          while($row = mysqli_fetch_array($result_tasks)){ ?>  <!--mysqli_fetch_array() 獲取數據作為數組-->
          <tr>
            <td><?php echo $row['title']?></td>
            <td><?php echo $row['description']?></td>
            <td><?php echo $row['created_at']?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
              <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
              <i class="fas fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
          <input type ="submit">
        </form>
        </tbody>
      </table>
      
      </div>

  </div>
</div>

 <?php include("includes/footer.php")?>