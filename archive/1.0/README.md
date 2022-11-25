# php-image-resizer with aspect ratio
A simple mathematical approach to resize images (php 5.3 or above)

<h3><a href="https://plugins.nayague.com/easy-php-image-resizer/" target="_blank">Live example<a/></h3>

1. Download "php-image-resizer.php" and copy it into your image directory.
    example 1 - uploads/php-image-resizer.php
    example 2 - images/php-image-resizer.php

2. Give the image file name that you want to resize.
    Line #3
    Step 1. if your image file name is "sample-image-jpg".
    Step 2. $source_url = "sample-image.jpg";

    Or you can execute this php file once the image is uploaded.

    Step 1. Use a any query to get the image file name.

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