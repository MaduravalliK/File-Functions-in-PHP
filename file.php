<?php
$file = "data.txt";
 
// Check the existence of file
if(file_exists($file)){
    // Attempt to open the file
   	$handle = fopen($file, "r") or die("ERROR: Cannot open the file.");
        
    // Read fixed number of bytes from the file
    $content = fread($handle, "20");

    // Reading the entire file
    $content = fread($handle, filesize($file));

    // Reads and outputs the entire file
    readfile($file) or die("ERROR: Cannot open the file.");

    // Reading the entire file into a string
    $content = file_get_contents($file) or die("ERROR: Cannot open the file.");

    // Reading the entire file into an array
    $arr = file($file) or die("ERROR: Cannot open the file.");
    foreach($arr as $line){
        echo $line;
    }
        
    // Closing the file handle
    fclose($handle);
        
    // Display the file content 
    echo $content;
} else{
    echo "ERROR: File does not exist.";
}
?>


<?php   // Writing the Files Using PHP fwrite() Function
$file = "note.txt";
    
// String of data to be written
$data = "The quick brown fox jumps over the lazy dog.";
    
// Open the file for writing
$handle = fopen($file, "w") or die("ERROR: Cannot open the file.");
    
// Write data to the file
fwrite($handle, $data) or die ("ERROR: Cannot write the file.");

// Write data to the file
file_put_contents($file, $data) or die("ERROR: Cannot write the file.");


// Append data to the file
file_put_contents($file, $data, FILE_APPEND) or die("ERROR: Cannot write the file.");

// Attempt to rename the file
	$filename = "names.txt";
    if(rename($filename, "newfile.txt")){
        echo "File renamed successfully.";
    } else{
        echo "ERROR: File cannot be renamed.";
    }

// Attempt to delete the file
    $filename = "delnames.txt";
    /*if(unlink($filename)){
        echo "File removed successfully.";
    } else{
        echo "ERROR: File cannot be removed.";
    } */   
    
// Closing the file handle
fclose($handle);
    
echo "Data written to the file successfully.";
?>



<?php /*

PHP 5 File System Functions
The following section contains a list of useful PHP file system functions.

PHP File System Functions
The following file system functions are the part of the PHP core so you can use these functions within your script without any further installation.

Function	Description
basename()	Returns the filename component of a path
chgrp()	Changes the file group
chmod()	Changes the file mode
chown()	Changes the file owner
clearstatcache()	Clears the file status cache
copy()	Copies a file
delete()	See unlink() or unset()
dirname()	Returns the path of the parent directory
disk_free_space()	Returns available space on filesystem or disk partition
disk_total_space()	Returns the total size of a filesystem or disk partition
diskfreespace()	Returns available space on filesystem or disk partition. Alias of disk_free_space()
fclose()	Closes an open file pointer
feof()	Tests for end-of-file on a file pointer
fflush()	Flushes the buffered output to a file
fgetc()	Returns a character from file pointer
fgetcsv()	Gets line from file pointer and parse for CSV fields
fgets()	Read a specific number of bytes from a file
fgetss()	Reads a specific number of bytes from a file and strip HTML tags and PHP code
file()	Reads entire file into an array
file_exists()	Checks whether a file or directory exists
file_get_contents()	Reads entire file into a string
file_put_contents()	Write a string to a file
fileatime()	Returns the last access time of a file
filectime()	Returns the last change time of a file
filegroup()	Returns the group ID of a file
fileinode()	Returns the inode number of the file
filemtime()	Returns the last modification time of a file
fileowner()	Returns the user ID of the owner of the file
fileperms()	Returns permissions for the file
filesize()	Returns the file size
filetype()	Returns the file type
flock()	Locks or releases a file
fnmatch()	Matches a filename or string against a specified pattern
fopen()	Opens a file or URL
fpassthru()	Output all remaining data on a file pointer
fputcsv()	Format line as CSV and write to file pointer
fputs()	Alias of fwrite()
fread()	Reads a specific number of bytes from a file
fscanf()	Parses input from a file according to a specified format
fseek()	Seeks on a file pointer
fstat()	Returns information about a file using an open file pointer
ftell()	Returns the current position of the file read/write pointer
ftruncate()	Truncates a file to a given length
fwrite()	Writes the contents of string to the file pointer
glob()	Returns an array of filenames/directories matching a specified pattern
is_dir()	Checks whether the file is a directory
is_executable()	Checks whether the file is executable
is_file()	Checks whether the file is a regular file
is_link()	Checks whether the filename is a symbolic link
is_readable()	Checks whether a file exists and is readable
is_uploaded_file()	Checks whether the file was uploaded via HTTP POST
is_writable()	Checks whether the filename is writable
is_writeable()	Alias of is_writable()
lchgrp()	Changes group ownership of symlink
lchown()	Changes user ownership of symlink
link()	Create a hard link
linkinfo()	Returns information about a link
lstat()	Returns information about a file or symbolic link
mkdir()	Creates a directory
move_uploaded_file()	Moves an uploaded file to a new location
parse_ini_file()	Parse a configuration file
parse_ini_string()	Parse a configuration string
pathinfo()	Returns information about a file path
pclose()	Closes process file pointer
popen()	Opens process file pointer
readfile()	Reads a file and writes it to the output buffer
readlink()	Returns the target of a symbolic link
realpath()	Returns canonicalized absolute pathname
realpath_cache_get()	Returns realpath cache entries
realpath_cache_size()	Returns realpath cache size
rename()	Renames a file or directory
rewind()	Rewind the position of a file pointer
rmdir()	Removes an empty directory
set_file_buffer()	Sets the buffer size of a file
stat()	Returns information about a file
symlink()	Creates a symbolic link
tempnam()	Create temporary file with unique file name
tmpfile()	Creates a unique temporary file
touch()	Sets access and modification time of file
umask()	Changes the current umask
unlink()	Deletes a file


*/
?>

<?php 
// The directory path  Creating a New Directory
$dir = "testdir";
 
// Check the existence of directory
if(!file_exists($dir)){
    // Attempt to create directory
    if(mkdir($dir)){
        echo "Directory created successfully.";
    } else{
        echo "ERROR: Directory could not be created.";
    }
} else{
    echo "ERROR: Directory already exists.";
}

// Copying Files from One Location to Another

// Source file path
$file = "example.txt";
 
// Destination file path
$newfile = "backup/example.txt";
 
// Check the existence of file
if(file_exists($file)){
    // Attempt to copy file
    if(copy($file, $newfile)){
        echo "File copied successfully.";
    } else{
        echo "ERROR: File could not be copied.";
    }
} else{
    echo "ERROR: File does not exist.";
}


// Listing All Files in a Directory

// Define a function to output files in a directory
function outputFiles($path){
    // Check directory exists or not
    if(file_exists($path) && is_dir($path)){
        // Scan the files in this directory
        $result = scandir($path);
        
        // Filter out the current (.) and parent (..) directories
        $files = array_diff($result, array('.', '..'));
        
        if(count($files) > 0){
            // Loop through retuned array
            foreach($files as $file){
                if(is_file("$path/$file")){
                    // Display filename
                    echo $file . "<br>";
                } else if(is_dir("$path/$file")){
                    // Recursively call the function if directories found
                    outputFiles("$path/$file");
                }
            }
        } else{
            echo "ERROR: No files found in the directory.";
        }
    } else {
        echo "ERROR: The directory does not exist.";
    }
}
 
// Call the function
outputFiles("mydir");

/* Search the directory and loop through
returned array containing the matched files */
foreach(glob("documents/*.txt") as $file){
    echo basename($file) . " (size: " . filesize($file) . " bytes)" . "<br>";
}
?>


<?php
// Define a function to output files in a directory
function outputFiles1($path){
    // Check directory exists or not
    if(file_exists($path) && is_dir($path)){
        // Search the files in this directory
        $files = glob($path ."/*");
        if(count($files) > 0){
            // Loop through retuned array
            foreach($files as $file){
                if(is_file("$file")){
                    // Display only filename
                    echo basename($file) . "<br>";
                } else if(is_dir("$file")){
                    // Recursively call the function if directories found
                    outputFiles1("$file");
                }
            }
        } else{
            echo "ERROR: No such file found in the directory.";
        }
    } else {
        echo "ERROR: The directory does not exist.";
    }
}
 
// Call the function
outputFiles1("mydir");
?>

<?php /*
PHP File Download  Downloading Files with PHP  //Forcing a Download Using PHP 	*/
?>
<a href="downloads/PHP.zip">Download Zip file</a>
<a href="downloads/MySQL.pdf">Download PDF file</a>
<a href="downloads/Desert.jpg">Download Image file</a>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Simple Image Gallery</title>
<style type="text/css">
    .img-box{
        display: inline-block;
        text-align: center;
        margin: 0 15px;
    }
</style>
</head>
<body>
    <?php
    // Array containing sample image file names
    $images = array("Desert.jpg", "Koala.jpg");
    
    // Loop through array to create image gallery
    foreach($images as $image){
        echo '<div class="img-box">';
            echo '<img src="downloads/' . $image . '" width="200" alt="' .  pathinfo($image, PATHINFO_FILENAME) .'">';
            echo '<p><a href="download.php?file=' . urlencode($image) . '">Download</a></p>';
        echo '</div>';
    }
    ?>
</body>
</html>

