<?php
include("db.php");

if(isset($_GET['id'])){ //isset 判定$_SESSION[]是否有值
  $id=$_GET['id'];
  $query="SELECT * FROM task WHERE id=$id";
  $result=mysqli_query($conn,$query); ///mysqli_query() 查詢數據
  if(mysqli_num_rows($result)==1){   // mysqli_num_rows 查詢 mysqi_query 存在的行數
    $row =mysqli_fetch_array($result);  //mysqli_fetch_array() 獲取數據作為數組
    $title=$row['title'];
    $description=$row['description'];
  }

}
if(isset($_POST['update'])){
  $id = $_GET['id'];
  $title= $_POST['title'];


  
  $description = $_POST['description'];

  $query = "UPDATE task set title = '$title', description = '$description' WHERE id=$id";
  mysqli_query($conn, $query); ///mysqli_query() 查詢，執行更改數據
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');


}
?>

<?php include("includes/header.php")?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST">
          <div class="form-group">
            <input type="text" name="title" value="<?php echo $title;?>"
            class="form-controll" placeholder="Update title">
          </div>
          <div class="form-group">
            <textarea name="description" rows="2" class="form-controll" 
            placeholder="Update Description"><?php echo $description?></textarea>
          </div>
          <button class="btn-success" name="update">
            Update
          </button>
        </form>
      </div>
    </div>
  </div>


</div>





<?php include("includes/footer.php")?>