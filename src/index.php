<?php 

namespace Gayansandamal\EzImageResizer;

class Index
{
  public $filename;
  public $extension;
  public $source_url;
  public $source_url_parts;

  public function ezImageResize($source, $settings)
  {
    //path for the image
    $this->source_url = $source;

    //separate the file name and the extention
    $this->source_url_parts = pathinfo($this->source_url);
    $this->filename = $this->source_url_parts['filename'];
    $this->extension = $this->source_url_parts['extension'];

    //define the quality from 1 to 100
    $this->quality = isset($settings->quality) ? $settings->quality : 10;

    //detect the width and the height of original image
    list($width, $height) = getimagesize($this->source_url);
    $width;
    $height;

    //define any width that you want as the output. default will be the original size.
    $after_width = isset($settings->width) ? $settings->width : $width;

    //resize only when the original image is larger than expected with.
    //this helps you to avoid from unwanted resizing.
    if ($width > $after_width) {
        //get the reduced width
        $reduced_width = ($width - $after_width);
        //now convert the reduced width to a percentage and round it to 2 decimal places
        $reduced_radio = round(($reduced_width / $width) * 100, 2);
        
        //ALL GOOD! let's reduce the same percentage from the height and round it to 2 decimal places
        $reduced_height = round(($height / 100) * $reduced_radio, 2);
        //reduce the calculated height from the original height
        $after_height = $height - $reduced_height;
        
        //Now detect the file extension
        //if the file extension is 'jpg', 'jpeg', 'JPG' or 'JPEG'
        if (strtolower($this->extension) == 'jpg' || strtolower($this->extension) == 'jpeg') {
            //then return the image as a jpeg image for the next step
            $img = imagecreatefromjpeg($this->source_url);
        } elseif (strtolower($this->extension) == 'png') {
            //then return the image as a png image for the next step
            $img = imagecreatefrompng($this->source_url);
        } else {
            //show an error message if the file extension is not available
            echo 'image extension is not supporting';
        }
        
        //HERE YOU GO :)
        //Let's do the resize thing
        //imagescale([returned image], [width of the resized image], [height of the resized image], [quality of the resized image]);
        $imgResized = imagescale($img, $after_width, $after_height, $this->quality);
        
        //now save the resized image with a suffix called "-resized" and with its extension. 

        $processedFileName = $this->filename;
        if (isset($settings->prefix)) {
          $processedFileName = $settings->prefix . $this->filename;
        } else if (isset($settings->suffix)) {
          $processedFileName = $this->filename . $settings->suffix;
        }
        imagejpeg($imgResized, $processedFileName . '.'.$this->extension, 0);
        
        //Finally frees any memory associated with image
        //**NOTE THAT THIS WONT DELETE THE IMAGE
        imagedestroy($img);
        imagedestroy($imgResized);
        echo 'successfully resized';
    }
  }
}