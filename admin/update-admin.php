<?php
    include("partials/menu.php");
    ?>




<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br> <br>


        <?php
        //get the id
      if(isset($_GET['id']))
      {
        $id= $_GET['id'];
       
        //sql query
        $sql = "SELECT * FROM tbl_admin WHERE id=$id" ;
        $res= mysqli_query($conn,$sql);

        if($res==true)
        {

            //query is successful
       $count = mysqli_num_rows($res);
       if($count==1)
       {
        //get rows
        $row= mysqli_fetch_assoc($res);
        
        $full_name = $row['full_name'];
        $username= $row['username'];

       }
        else{
            //redirect
        header("location:".SITEURL.'admin/manage-admin.php');
        }


        }
      }
      else
      {
        //without id you can't access update
        header("location:".SITEURL.'admin/manage-admin.php');
      }

?>
        <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Full Name </td>
                        <td><input type="text" name="full_name"  value="<?php echo $full_name; ?> "></td>
                        
                        
                    </tr>
                    <tr>
                    <td>UserName</td>
                    <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                    </tr>

                    

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>"> 
                            <input type="submit" name="submit" value="Update Admin Info"  class="btn-secondary">
                        </td>
                    </tr>

                </table>



            </form>


    </div>

</div>

<?php 
        //updating in dbms
        if(isset($_POST['submit']))
        {
            $id = $_POST['id'];
            $full_name= $_POST['full_name'];
            $username = $_POST['username'];

            $sql = "UPDATE tbl_admin SET full_name='$full_name', username = '$username' where id='$id' " ;

            //Execute query
            $res = mysqli_query($conn,$sql);
            if($res==true)
            {
                    $_SESSION['update'] = "<div class='success'>Admin Updated </div>" ;
                    header("location:".SITEURL.'admin/manage-admin.php');
            }
            else
            {
                $_SESSION['update'] = "<div class='error'>Admin can not be Updated </div>" ;
                header("location:".SITEURL.'admin/manage-admin.php');
            }
        }


?>



<?php
    include("partials/footer.php");
    ?>