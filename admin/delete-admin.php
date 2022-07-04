<?php
include('../config/constants.php');
$id= $_GET['id'];

$sql = "DELETE FROM tbl_admin WHERE id=$id" ;

$res= mysqli_query($conn,$sql); //$conn is described in constants

if($res==true)
{

    //query is successful
   $_SESSION['delete']="Admin is deleted";
   header("location:".SITEURL.'admin/manage-admin.php');


}



?>