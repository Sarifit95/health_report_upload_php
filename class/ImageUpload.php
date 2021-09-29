<?php


class ImageUpload
{


    function imageResize($imageResourceId,$mwidth,$mheight, $width, $height) {
        $targetWidth =$width;
        $targetHeight =$height;
        $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
        imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $mwidth,$mheight);
        return $targetLayer;
    }
    function imagesave($filename,$savefilename, $uploadfolder, $width, $height){

        $file = $_FILES[$filename]['tmp_name'];
        $sourceProperties = getimagesize($file);
        $ext = pathinfo($_FILES[$filename]['name'], PATHINFO_EXTENSION);
        $fileNewName = $savefilename."." . $ext;
        $imageType = $sourceProperties[2];
        $filewroot = "$uploadfolder/" . $fileNewName;
        switch ($imageType) {
            case IMAGETYPE_PNG:
                $imageResourceId = imagecreatefrompng($file);
                $targetLayer = $this->imageResize($imageResourceId,  $sourceProperties[0], $sourceProperties[1], $width, $height);
                imagepng($targetLayer, $filewroot);
                break;

            case IMAGETYPE_GIF:
                $imageResourceId = imagecreatefromgif($file);
                $targetLayer = $this->imageResize($imageResourceId,  $sourceProperties[0], $sourceProperties[1], $width, $height);
                imagegif($targetLayer, $filewroot);
                break;

            case IMAGETYPE_JPEG:
                $imageResourceId = imagecreatefromjpeg($file);
                $targetLayer = $this->imageResize($imageResourceId,  $sourceProperties[0], $sourceProperties[1], $width, $height);
                imagejpeg($targetLayer, $filewroot);
                break;

            default:
                echo "Invalid Image type.";
                exit;
                break;

        }

    }
    function removefile($imagename, $folder){

        if (!empty($imagename) && file_exists($folder.'/'.$imagename)){
            unlink($folder.'/'.$imagename);
        }


    }





}
