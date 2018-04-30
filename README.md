# php-image-resizer with aspect ratio
A simple mathematical approach to resize images (php 5.3 or above)

1. Download "php-image-resizer.php" and copy it into your image directory.
    example 1 - uploads/php-image-resizer.php
    example 2 - images/php-image-resizer.php

2. Give the image file name that you want to resize.
    Line #3
    Step 1. if your image file name is "sample-image-jpg".
    Step 2. $source_url = "sample-image.jpg";

    Or you can execute this php file once the image is uploaded.

    Step 1. Use a any query to get the image file name like in below.
    
<?php
    include_once '../conn.php';
    $get_last_img = "
    SELECT
    REPLACE(img_path, '/uploads/', '') AS img_path
    FROM image
    ORDER BY img_id DESC
    LIMIT 1
    ";

    $result_last_img_path = $conn->query($get_last_img_path);
    if ($result_last_im->num_rows > 0) {
        while ($row = $result_last_img->fetch_assoc()) {
            $img_path = $row["img_path"];
            }
            echo $img_path . "image is available to resize";
    } else {
        echo "Image is not found";
    }
?>

    Step 2. Assign image name variable to $source_url variable in line #3
    example -
    $source_url = $img_path;

3. Define an image quality. The quality range is from 1 to 100. check line #11. 
    example - $quality = 10;

4. Define the width that you want as the final output of the image. Line #19.
    example - $after_width = 250;
    * No need to specify a unit such as px(Pixels). It will automatically get the value in pixels.

5. It will check the width of input image is larger than the defined output width and will do the for you.

    ENJOY! ;-)