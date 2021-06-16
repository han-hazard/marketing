<?php
    $myfile= "name.txt";
    $readFile= fopen($myfile,"w");
    $read=fwrite($readFile,"Nguyen Van A | 26 \n");
    $read=fwrite($readFile,"Nguyen Van B | 25 \n");
    $read=fwrite($readFile,"Nguyen Van C | 27 \n");
    
    $move=fopen($myfile,"r");
    $readChange = fread($move, filesize($myfile));
    $moveFile= explode(" | ",$readChange);
    var_dump($moveFile);
    
    
    //echo $read;
?>