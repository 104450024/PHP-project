<?php 
// Load the database configuration file 
include_once 'db.php'; 

// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 

$s=$_POST['s'];
 
// Excel file name for download 
$fileName = "members-data_" . date('Y-m-d') . ".txt"; 
 
// Column names 
$fields = array('title', 'description', 'created_at'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Fetch records from database 
$query = $conn->query("SELECT * FROM task where title like '%$s%'"); 
if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = $query->fetch_assoc()){ 

        $lineData = array($row['title'], $row['description'], $row['created_at']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
 
// Headers for download 
header("Content-type:application/vnd.ms-excel;charset=UTF-8"); //application/vnd.ms-excel指定輸出Excel格式
header("Content-Disposition:filename=表格檔名.xls"); 
 
// Render excel data 
echo $excelData; 
 
exit;