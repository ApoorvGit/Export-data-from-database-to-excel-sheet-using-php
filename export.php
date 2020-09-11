<?php  
$host=$_COOKIE["host"];
$user=$_COOKIE["user"];
$pass=$_COOKIE["pass"];
$database=$_COOKIE["database"];
$table=$_COOKIE["table"];
$conn =mysqli_connect($host,$user,$pass,$database);  
$sql = "SELECT * FROM `$table`";  
$setRec = mysqli_query($conn, $sql);   
$setData = '';  
  while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
$query="select DISTINCT column_name from Information_schema.columns where Table_name='$table' ORDER BY ordinal_position";
$run=mysqli_query($conn,$query);
$data=mysqli_fetch_assoc($run);
$heading=$data["column_name"]."\t";
while($data=mysqli_fetch_assoc($run)){
    $heading=$heading.$data["column_name"]."\t";
}   
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=sheet.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($heading) . "\n" . $setData . "\n";  
 ?>