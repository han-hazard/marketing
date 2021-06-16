<?php 
   function sum($a,$b,$c,$d){
       $arr = array($a,$b,$c,$d);
       $tong=0;
       for($i=0;$i<count($arr);$i++){
        $tong=$tong+$arr[$i];
       }
       return $tong;
   }
   echo "tổng của mảng là " .sum(1,2,3,4) .  "<br>";
   
   function maxAr($a,$b,$c,$d){
       $arr = array($a,$b,$c,$d);
       $maxArr= $arr[0];
       for($i=0;$i<count($arr);$i++){
        if($maxArr<$arr[$i]){
            $maxArr=$arr[$i];
        }
       }
       return $maxArr;
   }
   echo "phần tử lớn nhất của mảng là " .maxAr(1,2,3,4) .  "<br>";
   function minAr($a,$b,$c,$d){
       $arr = array($a,$b,$c,$d);
       $minArr = $arr[0];
       for($i=0;$i<count($arr);$i++){
        if($minArr>$arr[$i]){
            $minArr=$arr[$i];
        }
       }
       return $minArr;
   }
   echo "phần tử nhỏ nhất của mảng là " .minAr(1,2,3,4) .  "<br>";

?>