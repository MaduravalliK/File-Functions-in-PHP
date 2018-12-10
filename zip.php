<?php


/* create a compressed zip file */
function createZip($files = array(), $destination = '', $overwrite = false) {


   if(file_exists($destination) && !$overwrite) { return false; }


   $validFiles = [];
   if(is_array($files)) {
      foreach($files as $file) {
         if(file_exists($file)) {
            $validFiles[] = $file;
         }
      }
   }


   if(count($validFiles)) {
      $zip = new ZipArchive();
      if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
         return false;
      }


      foreach($validFiles as $file) {
         $zip->addFile($file,$file);
      }


      $zip->close();
      return file_exists($destination);
   }else{
      return false;
   }
}


$fileName = 'my-archive.zip';
$files_to_zip = ['demo1.jpg', 'demo2.jpg'];
$result = createZip($files_to_zip, $fileName);


header("Content-Disposition: attachment; filename=\"".$fileName."\"");
header("Content-Length: ".filesize($fileName));
readfile($fileName);


?>