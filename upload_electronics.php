<?php

include('./include/header.php');
include('./include/nav.php');
$msg = "";
echo $msg;

// if upload image is pressed
if(isset($_POST['upload'])){
//path to store uploaded image

    $target = "images/".basename($_FILES['image']['name']);
//connect to the database    
    $db = mysqli_connect("localhost","root","","photos");
//get all the submitted data from the form
    $image = $_FILES['image']['name'];  
    $text = $_POST['text'];
    $price = $_POST['price'];
    $location = $_POST['location'];
    $number = $_POST['number'];

    $sqli = "INSERT INTO details(price,location,number)VALUES('$price','$location','$number')";
    $sql = "INSERT INTO images(image,text)VALUES('$image','$text')";
    mysqli_query($db,$sql);//stores submitted data into database table:images

   mysqli_query($db,$sqli);
//lets move uploaded image into folder:images
     if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
         $msg = "Image uploaded succesfully🔥🎉🎉";
         echo $msg;
         header("Location:electronics.php");

     }else{
         $msg = "There was an error❌✖";
         echo $msg;
     }    
}

?>



<div id="content">
    <div class="jumbo">
        <h3>Upload Product🎁🎁🤘🤘</h3>
    </div>
    <form action="upload_electronics.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="size" value="1000000">
        <div class="image_upload_box">
            <input type="file" name="image" class="btn btn-primary">
        </div>
        <div class="image_upload_box">

        </div>
        <div class="image_upload_box">

            <input type="text" name="price" placeholder="Price">
            <input type="text" name="category" placeholder="Category">
            <input type="text" name="location" placeholder="Location📌">
            <input type="text" name="number" placeholder="Phone Number">
            <p>Describe the product you are selling😎</p>
            <textarea name="text" id="" cols="40" rows="4">
            </textarea>

        </div>
        <div class="image_upload_box">
            <input type="submit" name="upload" value="Upload Product🎉" class="btn btn-success">
        </div>


    </form>
</div>
</body>

<?php
include("./include/footer.php");
?>