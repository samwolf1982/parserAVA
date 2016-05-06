<?php
//read arr
	require_once 'setings.php';
   //  просто чистит файл
echo $GLOBALS['path_hash'];
file_put_contents($GLOBALS['path_hash'],",",LOCK_EX);

echo 'хеш очищен';
/*if(isset($_POST['count'])){
    // echo "string  ".$_POST['count'];
    $post_count= $_POST['count'];
  //read arr
	require_once 'setings.php';
     просто чистит файл

       // для продоления работи разкоментировать	
	$file_c = file_get_contents($GLOBALS['path_hash']);
        $all_hasess = explode(",",trim($file_c));
        echo $count= count($all_hasess);
            //if($post_count>$count) $post_count=$count;
             if($count>0){ // массив не пустой
                    $res=$count-$post_count;  // 5-2
                      if( $res>0){
                             $output = array_slice($all_hasess,0,$res);
        file_put_contents($GLOBALS['path_hash'],
	implode(",",$output),LOCK_EX);

         echo "удалено ". $post_count.' улементов<br> сейчас есть '.count($output).' елементов' ;

                                 }


             }

               

            
        
}*/


?>