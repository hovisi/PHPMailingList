<?php
/*
    Bella Hovis  
    CSCI 297 Scripting Languages   
    Assignment: Mailing List
    Description: This file will have function to read, add, and delete lines in a file
*/

//function to read lines
function readLines($filename)
{
    $fileResource = fopen($filename, 'r'); 

    if(!is_resource($fileResource))
    {
        exit("Could not open the file for reading."); 
    }

    $contents = array(); 

    while($line = fgets($fileResource))
    {
        $contents[] = $line;
    }

    fclose($fileResource);

    return $contents; 
}

//function to add line
function appendLine($filename, $line)
{
    $fileResource = fopen($filename, 'a'); 

    if(!is_resource ($fileResource))
    {
        exit("Could not open the file for appending."); 
    }

    fwrite($fileResource, $line); 

    fclose($fileResource); 

    return null; 
}

//function to delete line
function deleteLine($filename, $lineNumber)
{
    $contents = readLines($filename); 

    unset($contents[$lineNumber]); 

    $fileResource = fopen($filename, 'w'); 

    if(!is_resource ($fileResource))
    {
        exit("Could not open the file while writing."); 
    }

    foreach($contents as $contentLine)
    {
        fwrite($fileResource, $contentLine); 
    }

    fclose($fileResource); 

    return null;
}



?> 