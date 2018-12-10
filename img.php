<?php // https://code.tutsplus.com/tutorials/manipulating-images-in-php-using-gd--cms-31701
function LoadJpeg($imgname)
{
    /* Attempt to open */
    $im = @imagecreatefromjpeg($imgname);

    /* See if it failed */
    if(!$im)
    {
        /* Create a black image */
        $im  = imagecreatetruecolor(150, 30);
        $bgc = imagecolorallocate($im, 255, 255, 255);
        $tc  = imagecolorallocate($im, 0, 0, 0);

        imagefilledrectangle($im, 0, 0, 150, 30, $bgc);

        $string = "Error loading ";
        $px     = (imagesx($im) - 7.5 * strlen($string)) / 2;
        /* Output an error message */
        imagestring($im, 3, 5, 5, $string . $imgname, $tc);
    }

    return $im;
}


/*
$string = $_GET['text'];
$im     = imagecreatefrompng("images/Desert.jpg");
$orange = imagecolorallocate($im, 220, 210, 60);
$px     = (imagesx($im) - 7.5 * strlen($string)) / 2;
imagestring($im, 3, $px, 9, $string, $orange);
*/
header('Content-Type: image/jpeg');

$img = LoadJpeg('D:/xampp/htdocs/Samples/files/imgs/Desert.jpg');

imagejpeg($img);
imagedestroy($img);
?>