<?php 
  
   function sum(){
       $array= array(1,3,5,7,9,11);
       $tong=0;
       for($i=0;$i<count($array);$i++){
              $tong=$tong+$array[$i];
       }
       return $tong;
   }
   echo "tổng của mảng là:" . sum() . "<br>";
   function maxarr(){
        $array= array(1,3,5,7,9,11);
        $max=null;
        
        for($i=0;$i<count($array);$i++){
            if($max==null){
                $max=$array[$i];
            
            }else{
                if($array>$max){
                    $max =$array[$i];
                
                }
            }

        }
        
        return $max;
   }
   
   echo "số lớn nhất của mảng là: " . maxarr(). "<br>";
   function minarr(){
        $array= array(1,3,5,7,9,11);
        $min=null;
        
        for($i=0;$i<count($array);$i++){
            if($min==null){
                $min=$array[$i];
            
            }else{
                if($array<$min){
                    $min =$array[$i];
                
                }
            }

        }
        
        return $min;
   }
   
   echo "số nhỏ nhất của mảng là: " . minarr(). "<br>";
?>