<?php include('partials/menu.php');
?>

        <!-- Main Content Starts -->
        <div class="main-content">
        <div class="wrapper">
            <h1>Dashboard</h1>
            <?php 
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?>
            <div class="box text-center">
                <h1>5</h1>
                <br/>
                Categories
            </div>
            <div class="box text-center">
                <h1>5</h1>
                <br/>
                Categories
            </div>
            <div class="box text-center">
                <h1>5</h1>
                <br/>
                Categories
            </div>
            <div class="box text-center">
                <h1>5</h1>
                <br/>
                Categories
            </div>
            <div class="clearfix"></div>
        </div>
        </div>
        <!-- Main Content Ends -->

        <?php include('partials/footer.php');
?> 