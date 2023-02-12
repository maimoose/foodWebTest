<?php include("partials/menu.php");
?>
    <!-- Main Content Starts -->
    <div class="main-content">
    <div class="wrapper">
    <h1>Manage Category</h1>
        <br/><br/>
    <?php 
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add']; //Displaying session msg
            unset($_SESSION['add']); //Removing session msg
        } 
    ?> <br><br>
        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary"> Add Category </a>
        <br/><br/>

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>

            <?php 
                // query to get all queries from category DB
                $sql = "SELECT * FROM tbl_category"; 
                // excetue query
                $res = mysqli_query($conn, $sql);
                // count rows
                $count = mysqli_num_rows($res); 
                $sn =1;
                if($count>0)
                {
                        // we have data n we'll get or fetch data to display 
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $image_name = $row['image_name'];
                        $title = $row['title'];
                        $featured= $row['featured'];
                        $active = $row['active'];

                        ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $id; ?></td>

                            <td>
                                <?php 
                                // check whether image is available 
                                if($image_name != ""){
                                    ?>
                                  <!-- display the image -->
                                        <img src="<?php echo SITEURL; ?>images/category<?php echo $image_name;?>" width="  100px">

                                    <?php
                                }
                                else{
                                    echo "<div class='error'>No image Added.</div>";
                                }
                                ?>
                            </td>

                            <td><?php echo $title; ?></td>
                            <td><?php echo $featured; ?></td>
                            <td><?php echo $active; ?></td>
                            <td> <a href="#" class="btn-up"> Update Category </a>
                                <a href="#" class="btn-dlt"> Delete Category </a> 
                            </td>
                        </tr>
                        <?php
                    }
                }
                else{

                    ?>
                    <!-- we dont have data  -->
                    <!-- display the msg inside table  -->
                    <tr>
                        <td colspan="6"><div class="error">No Category Added.</div></td>
                    </tr>
                    <?php
                }
            ?>
 <!-- td for table data idk but vj said sth it will changed later with dbms -->
                
        </table>
    </div>
    </div>
    <!-- Main Content Ends -->

<?php include('partials/footer.php');
?>               