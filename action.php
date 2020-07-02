<?php 
include "inti.php";
$output='';
if(isset($_POST['query'])){
    $search =$_POST['query'];
    $stmt=$link->prepare("SELECT *  FROM Users WHERE username LIKE CONCAT('%',?,'%') OR FullName LIKE  CONCAT('%',?,'%') ");
    $stmt->bind_param("ss",$search,$search);

}else{
    $stmt=$link->prepare("SELECT *  FROM Users WHERE GroupID!=1  ORDER BY UserID ASC");
}
//ececute the Query
$stmt->execute();
//fetch all data (fetch get you all data in an array)=>
 $rows=$stmt->get_result();
 if($rows->num_rows>0){
     $output = "<thead>
     <tr>
        <th>#ID</th>
        <th>#Name</th>
        <th>#email</th>
        <th>#full name</th>
        <th>#date</th>
     </tr>
  </thead>
  <tbody>";
  foreach($rows as $row){
      $output .="
        <tr>
          <td>".$row['UserID']."</td>
          <td>".$row['username']."</td>
          <td>".$row['Email']."</td>
          <td>".$row['FullName']."</td>
          <td>".$row['Date']."</td>
        </tr>";
  }
  $output.="</tbody>";
  echo $output;
 }else{
    echo "<h3>No Record Found.</h3>";
 }

?>