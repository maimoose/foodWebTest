<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>

        <?php 
        
        if(isset($_SESSION['add']))
            {
                echo $_SESSION['add']; //Displaying session msg
                unset($_SESSION['add']); //Removing session msg
            }
        if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload']; //Displaying session msg
                unset($_SESSION['upload']); //Removing session msg
            } 
        ?> <br><br>

        <!-- add cat form starts -->
        <form action="" method="POST" enctype="multipart/form-data">   <!-- enctype for image -->
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td><input type="text" name="title" placeholder="Category Title"> </td>
                </tr>
                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name= "image_name">
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No "> No
                    </td>
                </tr>
                <tr>
                    <td> Active: </td>
                    <td>
                        <input type="radio" name="active" value ="Yes"> Yes
                        <input type="radio" name="active" value ="No"> No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>
        <!-- add cat form ends -->

        <?php 
 // check whether submit btn is clicked or not  -->
 if(isset($_POST['submit']))
 {
    // 1. get value from form category
    $title = $_POST['title'];

    // For radio input, we need to 
    // check whether button is selected or not
    if(isset($_POST['featured']))
    {
        // get the value from form
        $featured = $_POST['featured'];
    }
    else{
        // set the default value
        $featured = "No" ;
    }

    if(isset($_POST['active']))
    {
        // get the value from form
        $active = $_POST['active'];
    }
    else{
        // set the default value
        $active = "No" ;
    }

    // check whether image is SELECTED or not  n set the value for image
// print_r($_FILES['image']); we use this instead of echo bcz echo CANT print ARRAY
//die(); to break the code here
    if(isset($_FILES['image_name']['name'])) // 'name' comes from array default or builtin name that we see in 
    {
        // upolad image
        // to upld image we ned: 1. image name 2. source path n destination path
        $image_name = $_FILES['image_name']['name'];

        // rename image file
        // extract file type using explode at dot "." 
        $ext = end(explode('.', $image_name));
        // rename
        $image_name = 'Food_category_'.rand(000,999).'.'.$ext;

        $source_path = $_FILES['image_name']['tmp_name'];

        $destination_path = "../images/category/".$image_name;
        // upload the image 
        $upload = move_uploaded_file($source_path, $destination_path);
        // check whether the image UPLOADED or not
        if($upload == false)
        {
            // set the msg
            $_SESSION['upload'] = "<div class='error'>Failed to upload Image</div>";
            // redirect to add category page
            header('location:'.SITEURL.'admin/add-category.php');
            // upload failed thus STOP the process so that data isn't inserted tnto DB
            die();
        }
    }
    else{
        // dnt upld image and set the value img_name as blank 
        $image_name = "";
    }


    // 2. create sql to with DB

    $sql = "INSERT INTO tbl_category SET
    title = '$title',
    image_name = '$image_name',
    featured = '$featured',
    active = '$active' 
    ";
    // 3. execute query n save in db
    $res = mysqli_query($conn, $sql);

       // 4. check if query is executed data  or not and data added or not 
       if($res==true)
       {
           // create a session variable to display msg here 
           $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
           // Redirect page to Manage category page 
           header('location:'.SITEURL.'admin/manage-category.php');
       }
       else
       {
            // create a session variable to display msg here 
            $_SESSION['add'] = "<div class='error'>Failed to Add Category</div>";
            // Redirect page to Add Admin 
            header('location:'.SITEURL.'admin/add-category.php'); 
       }
 }
        
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>

