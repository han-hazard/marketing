<?php
    require "students.php";
    $read=fwrite($readFile,"Nguyen Van D | 28 \n");
    
    $moveFile= explode(" | ",$readChange);
    foreach ($moveFile as $key => $move) {
        echo  "<br>" . $move . "<br>";
    }
?>