<?php
/**
 * Created by PhpStorm.
 * User: maxprihodko8
 * Date: 09.10.17
 * Time: 0:17
 */

namespace src\models;


class ImageHandler
{

    public function saveImage($image) {

        $target_dir = ROOT . "/uploads/";
        $target_file = $target_dir . basename($image["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        list($width, $height, $type, $attr) = getimagesize($image["tmp_name"]);;
        if(isset($_POST["submit"])) {
            return; // file is not an image
        }
        if (file_exists($target_file)) {
            return;
        }
        if($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg" && $imageFileType !== "gif" ) {
            return;
        }

        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            if ($width > 320 || $height > 240) {
                $imagick = new \Imagick($target_file);
                $imagick->cropThumbnailImage(320, 240);
                $imagick->writeImage($target_file);
            }
            return '/web/uploads/' . basename($image["name"]);
        }
    }
}