<?php
    include("partials/menu.php");
    ?>
    <div class="main-content">
         <div class="wrapper text-center">
            <h1 class="org-color">Add Category</h1>
            <br>

            <br>
            <br>
            <?php
            if(isset($_SESSION['add-cat1']))
            {
               echo $_SESSION['add-cat1'] ;
               unset($_SESSION['add-cat1']); //removing session
               
            }


            ?>


            

            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Category Title </td>
                        <td><input type="text" name="title" placeholder="Enter Category Title"></td>

                        
                        
                    </tr>

                    <tr>
                        <td>Image</td>
                       <td> <input type="file" name="image" > </td>



                    </tr>
                    <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="feature" value="Yes">Yes
                         <input type="radio" name="feature" value="No">No</td>
                    </tr>


                    

                    <tr>
                    <td>Active</td>
                    <td><input type="radio" name="active" value="Yes">Yes
                         <input type="radio" name="active" value="No">No</td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Category"  class="btn-secondary">
                        </td>
                    </tr>

                </table>



            </form>
         </div>
</div>

<?php



                if(isset($_POST['submit']))
                {
                   
                //value ano
                $title = $_POST['title'];
            
                if(isset($_POST['feature']))
               {
                $featured = $_POST['feature'];
               }
               else
               {
                $featured="No";
               }

               if(isset($_POST['active']))
               {
                $active= $_POST['active'];
               }
               else
               {
                $active="No";
               }


               /* to check img name
               print_r($_Files['image']);

               */

               ///to upload image
              if(isset($_FILES['image']['name']))
              {
                    // image name, source, destination
                    $image_name = $_FILES['image']['name'];
                   


                    //get extention
                    $ext= end(explode('.',$image_name));//jpg,png
                    $image_name="Pet_Category".rand(0,9999).'.'.$ext;
                    $source= $_FILES['image']['tmp_name'] ;
                    $destination ="../images/category/".$image_name ;




                    $upload = move_uploaded_file($source,$destination);

                    //checking upload
                    if($upload==false)
                    {
                        $_SESSION['upload']= "<div class='error' >Something went wrong in image upload </div>" ;
                        header('location:'.SITEURL.'admin/add-category.php');
                        die(); //process will be stopped

                    }
              }
              else
              {
                $image_name="" ; 
              }





                $sql= "INSERT into tbl_category SET
                         	title ='$title', image_name='$image_name',
                            featured='$featured', active='$active' " ;

                            echo $sql ;

               //now execute
               $res = mysqli_query($conn,$sql);
               if($res==true)
               {
                    $_SESSION['add-cat'] = "<div class='success' >Category Added </div>" ;
                    header("location:".SITEURL.'admin/manage-category.php');

               }
               else
               {
                $_SESSION['add-cat1'] = "<div class='error' >Something went wrong </div>" ;
                header('location:'.SITEURL.'admin/add-category.php');

               }

                



                }


?>

<?php
        include("partials/footer.php")
     ?>