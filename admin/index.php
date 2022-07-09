<?php
 include("partials/menu.php");
?>

<!-- Main Content Section Starts -->
    <div class="main-content">
        <div class="wrapper">
            <h3 class="text-center all-caps">Dashboard</h3>
            <br>
            <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                    
                ?>
                <br>
                
            <div class="col-4 text-center">
                <h2 class="text-white">6</h2>
                <p class="text-white">Categories</p>
            </div>
            <div class="col-4 text-center">
                <h2 class="text-white">10</h2>
                <p class="text-white">Pets</p>
            </div>
            <div class="col-4 text-center">
                 <h2 class="text-white">3</h2>
                <p class="text-white">Featured Categories</p>
            </div>
            <div class="col-4 text-center">
                 <h2 class="text-white">6</h2>
                <p class="text-white">Featured Pets</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Main Content Section Ends -->

<?php
    include("partials/footer.php");
?>