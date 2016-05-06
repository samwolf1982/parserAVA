<?php
header('Content-Type: text/html; charset=windows-1251');
header('Content-Type: text/html; charset=utf-8');
//                 caci@leeching.net   mail
//    db                us                 pass

require_once ('../phpQuery/phpQuery/phpQuery.php');
require_once 'setings.php';
require_once 'PhpDebuger/debug.php';




 function scanx($path_site)
{
 
  //$path_site='http://alitrust.ru/boasts/odezhda-i-obuv';
  # code...
  phpQuery::ajaxAllowHost($GLOBALS['curent_host']); 

  
  $file_c = file_get_contents($GLOBALS['path_hash']);
  $all_hasess = explode(",",trim($file_c));
  $GLOBALS['counter']=count($all_hasess);


  phpQuery::get($path_site,function ($do) use ($path_site)
    {
      # code...
      /*   $arrayName = array('main' =>'div.b-boast-list__item:nth-child() ', 'links_add_a'=>'div.b-boast-list__item:nth-child(' ); //x
*/
         // заход на любую страницу пускай 31
         // http://anti-free.ru/forum/showthread.php?t=58815&page=31 
         // поиск а указателя на ссилку на последниюю ссілку

      $document=phpQuery::newDocument($do);
      
     // парс ст. +отправка и сверка
      parse($document,$path_site);

        
  
      // потом встаить в цикл + проверка

  echo nl2br("\nok");


     //end anonim n GET
    }); 




// end fun scanx    
}


 function parse($value2,$path_site)
 {
   # code...
  $document=$value2;
                  // парс без параметров 
                        // если есть совпадения сразу брейк.
#posts > div:nth-child(4)     // количество елементов на странице
// удалить все пости спасибо  post_thanks_box_
       $s='div[id^="post_thanks_box"]';
$document->find($s)->remove();


  
          // поиск поста с id edit
      /*  $s='div[id^="edit"]';
        $el1 =$document->find($s);
      */
          // $c=count($el1);

            //  search td -post
$s='td[id^="td_post_"]';          //  10 шт
$s='div[id^="post_message_"]';   // 10 
        $el1 =$document->find($s);
       
       
   //     echo   $c=count($el1);
   foreach ($el1 as $key => $value) {
     # code...
    $res['text']=array();
          $res['img']=array();
    // take text
             $res['text'][]= pq($value)->text();
    // find image
            $im= pq($value)->find('img[src$=".jpg"]');
           // echo "<br>cddd ".count($im).'<br>';
            // take foto
            foreach ($im as $key1 => $value1) {
              # code...
                   $res['img'][]=pq($value1)->attr('src');
            }
               //echo "<br>----------------<br>";
              // var_dump($res);

$txt=$res['text'][0];

            // проверка на совпадение  сделать     false    go to wp 
if( is_present(hash('ripemd160', $txt))==false){

$res['fotos']= $res['img'];
$res['text']=$txt;


// post to wp

$path_parts = pathinfo($path_site);
 



$data='title='.$path_parts['dirname'].'&'.create_content($res);
// UNCOMENT
$wp=send('root',$data);
//var_dump($res);
//print_r($res);

}else{
  $file_c = file_get_contents($GLOBALS['path_hash']);
        $all_hasess = explode(",",trim($file_c));
        $count=count($all_hasess);


  echo 'Есть совпадение  дальше обрабатываеться но не добавлено \r\n'.($count-$GLOBALS['counter']).'  <br/>';
  //$i=count($child_links);
   //break;
   
}





   //echo "<br><br><br><br><br><br>";
        /// end loop        
   }
   

    
 }

// dont move
function find_last_button($value='')
{
  # code...
 $arrayName = array('main' =>'div.b-boast-list__item:nth-child() ', 'links_add_a'=>'div.b-boast-list__item:nth-child(' ); //x

         // заход на любую страницу пускай 31
         // http://anti-free.ru/forum/showthread.php?t=58815&page=31 
         // поиск а указателя на ссилку на последниюю ссілку

      $document=phpQuery::newDocument($do);
   //  echo "$document";
  //   echo $document;

              // взвять адресс посследней ссилки
 $el =$document->find($str=str_replace('>', ' ','#twocol > tbody:nth-child(1) > tr:nth-child(1) > td:nth-child(1) > div:nth-child(14) > div:nth-child(1) > div:nth-child(1) > table:nth-child(1) > tbody:nth-child(1) > tr:nth-child(1) > td:nth-child(2) > div:nth-child(1) > table:nth-child(1) > tbody:nth-child(1) > tr:nth-child(1) > td:nth-child(8) > a:nth-child(1)'));
 
  $el='a.smallfont:last';   // брать последню

  $el1 =$document->find($el );

      $last_page= pq($el1)->attr('href');   // количество елементов
       
       $last_page=$GLOBALS['forum'].$last_page;
   
     $last_page= parse_url($last_page);

                     
     parse_str($last_page['query'],$output);   

}





//    fasle если нету
function is_present($value)
	{

$path=$GLOBALS['path_hash'];
		if (!file_exists($path)) {
$myfile = fopen($path, "w") or die("Unable to open file!");
fclose($myfile);
}
         // добавить блокировку
		$file_c = file_get_contents($GLOBALS['path_hash']);
        $all_hasess = explode(",",trim($file_c));
		# code...
		if(!in_array($value, $all_hasess)){
                   //$all_hasess[]=$value;
                   // работа дальше
                   file_put_contents($path,','.$value,FILE_APPEND | LOCK_EX);

            
                   return false;
		}
		else {
			//die();
     // return false; //    //remove later
			 return true;
		}
	// end	is_present
	}
	 function create_content($data)
{
  $res='';
  foreach ($data['fotos'] as $key => $value) {
    # code...

   $res.=('<p><img src="'.$value.'" /></p>');
   
  }

     $res.='<p>'.$data['text'].'</p>';
  # code...

  return 'content='.$res;
 // end create_content
}

	 function send($autor,$data)
	{
		


$path=$GLOBALS['path_to_WP']; 

//error_log('curl  ',3,'log.txt');
		# code...
 if( $curl = curl_init() ) {
    curl_setopt($curl, CURLOPT_URL, $path);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_POST, false);

$data2='json=posts/create_post&autor='.$autor.'&'.$data;

    curl_setopt($curl, CURLOPT_POSTFIELDS,$data2);
    $out = curl_exec($curl);

    curl_close($curl);
   echo 'отправлено<br>\n';
   //echo " $path ** $data2";
  }

 // end send 
  
	}


                    // 50 el
if(isset($argv)){
   
  if (isset($argv[2]) && is_numeric($argv[2])) {
  set_time_limit(intval($argv[2])*30); 

  for ($i=1; $i <=intval($argv[2]) ; $i++) {

    # code...else{
  
    if($i==1){
   

  
 try {
 //echo "<br>i==".$i;

     scanx($argv[1]); 

  
 } catch (Exception $e) {
   echo 'Выброшено исключение: для  scanx ',  $e->getMessage(), "\n";
 }


    }
    else
{ 
  
       /* for ($i=0; $i < ; $i++) { 
          # code...
        }*/
 try {
  echo "<br>page i==".$i;
  scanx($argv[1].'&page='.$i);

  
 } catch (Exception $e) {
   echo 'Выброшено исключение: для  scanx ',  $e->getMessage(), "\n";
 }




}
      //end for
             sleep(rand(1,3));
  }
    }

  else
 {
  if (isset($argv[1])) {
    # code...
     try {
  
        scanx($argv[1]);
  

  
 } catch (Exception $e) {
   echo 'Выброшено исключение: для  scanx ',  $e->getMessage(), "\n";
 }
  }

 }
// end console
} 

if(isset($_POST['path'])){

  if(isset($_POST['path'])){
        // echo $_POST['path'];
  //die();
    if(isset($_POST['count'])){
   set_time_limit(intval($_POST['count'])*20); 
       for ($i=1; $i <=intval($_POST['count']) ; $i++) { 
        # code...
        if($i==1){
 try{scanx($_POST['path']);}catch (Exception $e) {
   echo 'Выброшено исключение: для  scanx ',  $e->getMessage(), "\n";
 }
          }
        


        else{
 try {
               scanx($_POST['path'].'&page='.$i);

  

  
 } catch (Exception $e) {
   echo 'Выброшено исключение: для  scanx ',  $e->getMessage(), "\n";
 }



              }
              // end for
              sleep(rand(1,3));
       }

    }else{
try{
   scanx($_POST['path']);

  

  
 } catch (Exception $e) {
   echo 'Выброшено исключение: для  scanx ',  $e->getMessage(), "\n";
 }


  }
  }
    else{
      try{
  $path_site='http://alitrust.ru/boasts/odezhda-i-obuv';
echo "117";
 echo $_POST ;
           scanx($path_site);

  

  
 } catch (Exception $e) {
   echo 'Выброшено исключение: для  scanx ',  $e->getMessage(), "\n";
 }


       }

}

 try {
  

  
 } catch (Exception $e) {
   echo 'Выброшено исключение: для  scanx ',  $e->getMessage(), "\n";
 }




?>