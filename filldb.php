<?php


//   пример команды   
//   /opt/lampp/bin/php-7.0.5  filldb.php http://ava.ua/category/18/59/p2/ GPS 61 12
 // или 
//  /opt/lampp/bin/php-7.0.5  filldb.php http://ava.ua/category/18/59/ GPS 61 12
 




//phpinfo();
/*define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'opencarta1');
define('DB_PORT', '3306');
define('DB_PREFIX', 'oc_');
*/
if (is_file('config.php')) {
	require_once('config.php');
}
  $GLOBALS['level_up'] = 0;





//**********************
//echo "string ";


function create_insert($value='')
{
	# code...
}

function create_update_image($value='')
{
	# code...
}
function create_insert_descr($value='')
{
	# code...
}

function get_last_id($mysqli)
{
	# code...
if ($result = $mysqli->query("SELECT LAST_INSERT_ID() as total")) {
	$data=mysqli_fetch_assoc($result);
//echo $data['total'];
   // printf("Select вернул %d строк.\n", $result->num_rows);
 
    //$row = $result->fetch_row();
//var_dump($result);
    //printf ("Citycc: %s  \n", $result);
/*  echo mysqli_result($result,0);
    echo mysqli_result($result,1);*/
    /* очищаем результирующий набор */
    $result->close();
    return $data['total'];
}

}


// from parse



require_once ('phpQuery/phpQuery/phpQuery.php');
require_once 'php5/setings.php';

require_once 'php5/PhpDebuger/debug.php';
phpQuery::ajaxAllowHost($GLOBALS['curent_host']); 
$GLOBALS['cat_id'] = 0;
$GLOBALS['group_id'] = 12;
$GLOBALS['img_folder'] = 'GPS';

$main_loop = array('115' =>  4,'836'=>2,'419'=>2,'194'=>4);

foreach ($main_loop as $key => $value) {
  # code...

$GLOBALS['img_folder'] ="FOLDER_MAIN_LOOP".rand().rand().rand() ;
$GLOBALS['cat_id'] = 0;
$GLOBALS['group_id'] = 13;
$argv[1]=$argv[1].$key.'/';
$argv[5]=$key;

// подстановка $argv[1] $argv[5]

try {
  scanx($argv[1]);
} catch (Exception $e) {
   echo PHP_EOL."I'm sleep 120s PAGE: ".$argv[1]. PHP_EOL;


     sleep(120);
}



for ($i=2; $i <=(int)$argv[5] ; $i++) { 
  //for ($i=22; $i <=(int)$argv[5] ; $i++) { 
  # code...
   try {
     scanx($argv[1]."p".$i."/");
   } catch (Exception $e) {
    echo PHP_EOL."I'm sleep 120s PAGE: ".$argv[1]."p".$i."/" . PHP_EOL;
    $i--;

     sleep(120);
   }



}







// end mail loop
}
 //                                                           
  //                                                         atribute id 
 //    1 путь. 2 папка для картинок 'GPS' 3 (cat id 0) 4 '(group_id') 12 ;
if(isset($argv[1]) & isset($argv[2]) & isset($argv[3]) & isset($argv[4] ) & isset($argv[5] )){

$GLOBALS['img_folder'] =$argv[2].rand().rand().rand() ;
$GLOBALS['cat_id'] = $argv[3];
$GLOBALS['group_id'] = $argv[4];
//$GLOBALS['id_cat']=$argv[5];
//echo $argv[1];



// подстановка $argv[1] $argv[5]

try {
  scanx($argv[1]);
} catch (Exception $e) {
   echo PHP_EOL."I'm sleep 120s PAGE: ".$argv[1]. PHP_EOL;


     sleep(120);
}



for ($i=2; $i <=(int)$argv[5] ; $i++) { 
  //for ($i=22; $i <=(int)$argv[5] ; $i++) { 
  # code...
   try {
     scanx($argv[1]."p".$i."/");
   } catch (Exception $e) {
    echo PHP_EOL."I'm sleep 120s PAGE: ".$argv[1]."p".$i."/" . PHP_EOL;
    $i--;

     sleep(120);
   }



}





}else{

}

// take  param abc 
//scanx('http://ava.ua/category/18/59/');


 function scanx($path_site)
{
 
 echo "Curen page ".$path_site.PHP_EOL;
  //$path_site='http://alitrust.ru/boasts/odezhda-i-obuv';
  # code...
  

  
 /* $file_c = file_get_contents($GLOBALS['path_hash']);
  $all_hasess = explode(",",trim($file_c));
  $GLOBALS['counter']=count($all_hasess);
*/

  phpQuery::get($path_site,function ($do) use ($path_site)
    {
   

      $document=phpQuery::newDocument($do);
    // echo "$document";  
     // парс ст. +отправка и сверка
      $path_site="http://ava.ua";
      parse($document,$path_site);
   

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
 $s='div[class^="item"]';


$res=$document->find($s);

/*echo "string";
echo count($res);
*/

$result=array();


  foreach ($res as $key => $value) {
  	# code...
// cсилка  http://ava.ua/product/761277/Prology-iMap-7300/
  	// результат   /product/761277/Prology-iMap-7300/
 $temp=$path_site.pq($value)->find('.title')->attr('href');

 //echo "rirle: ".$temp."<br>"; 

        phpQuery::get($temp,function ($do)
    {
   
     $cat_name=$GLOBALS['img_folder'];
     $state=true;
     $document=phpQuery::newDocument($do);
    // echo "$document";  
            $s='div[class^="item"]';
            $res=$document->find($s);//  property="gr:category"
               $model=$document->find('span[property="gr:category"]');
            $catalotype=pq($model)->text();
            
             /// model
            $model=$document->find('span[itemprop="model"]');
            $model=pq($model)->text();
            /// brand
            $brand=$document->find('span[itemprop="brand"]');
            $brand=pq($brand)->text();

           
            // min price
          //itemprop="lowPrice"
           $min_price=$document->find('var[itemprop="lowPrice"]');
           $min_price=pq($min_price)->text();
$min_price = (int)str_replace(array(" ", ".", ","), "", $min_price);
  
            // chfracterisstic
//            class="characteristics" 
 $desc=$document->find('.characteristics:first');
 $description=pq($desc)->text();
 $desc=$document->find('table.characteristics');
        $desc->find('#propsSwitch')->remove();
        
        $desc->find('.tooltip_filter')->remove();

 //echo "COUNT ".count($desc);
 //$description=pq($desc)->clone()->html();
 $temp_count=0;
 $text_atr="";
 foreach ($desc as $key => $value) {
 	# code...
 	//if($temp_count==1){
 	 $des=pq($value)->clone()->html();
 	   htmlspecialchars( $text_atr="<table>".$des."</table>");

 	//}
 	//$temp_count++;

 }


//.clone().html();
//$desc2= $document->find('.characteristics:eq(2)');

//echo htmlspecialchars($description);

 //echo 'COUNT '.count($description);
 
          
         // img

           // #img_761277
           // '[href^="#"]'
             $images=$document->find('img[id^="img_"]');
             $images=$document->find('a[class="show_zoom zoom_on_product"]');
             //echo "RTYUI  ";
               //   echo $images;
                  $images=pq($images)->attr('href');
                 // echo $images;
 //           echo $description;
          
          //  create  dir 
                  if(!file_exists( DIR_IMAGE.'catalog/'.$cat_name)){ 
                  	mkdir(DIR_IMAGE.'catalog/'.$cat_name); 
                  	    chmod(DIR_IMAGE.'catalog/'.$cat_name,0777);

                  }
                     // download image

               //  hash
                   $info = new SplFileInfo($images);
                  $hash=hash('ripemd160',$images);
                 
                  $image_path=DIR_IMAGE.'catalog/'.$cat_name.'/a'.$hash.'.'.$info->getExtension();

                        if(!file_exists($image_path)){
                    
                    	$file=file_get_contents($images);
                    	if($file!==false){ 
             file_put_contents($image_path, file_get_contents($images));
                                  chmod($image_path,0777);
                              }
                              else{$state=false;}
                    	
                        
                        	   

                        }
                        $image_path='catalog/'.$cat_name.'/a'.$hash.'.'.$info->getExtension();
                        // echo "-------".$image_path."<br>";
// категория.    брать из базы руками. смотреть log_EDIT.prod.txt
                       // $image_path='xxx';

/*$description=' <p><font size="5" color="red" face="Arial">'.$description.'</font>';*/
//$res_atr_text=$arr['atr'];


// берем хлебушек  все ul и на их основе формируем  все категории если надо
$list_cat = array();
   $ul=$document->find('#breadcrumbs > div:nth-child(1) > blockquote:nth-child(1) > ul:nth-child(1) li');
                  //$images=pq($images)->attr('href');
//$ul= array_flip($ul);
   foreach ($ul as $key => $value) {
     # code...
    $list_cat[]=pq($value)->text();
   /* echo "Bread crubs ".pq($value)->text().PHP_EOL;;
    is_present_cat($mysqli,pq($value)->text());*/
   }






      $arrayName = array('img' =>$image_path ,'text' =>$description ,'price' => $min_price,'model' =>$model ,'brand' =>$brand ,'cat_id'=>$GLOBALS['cat_id'] ,'atr'=>$text_atr,'group_id'=>$GLOBALS['group_id'],'category'=>$catalotype,'list_cat'=>$list_cat);            
     if($state!=false){
           
                           write($arrayName);

     }
                            



     //end anonim n GET
    }); 


//      break;



}




 


  	//echo "value IMAGE ";
  }

 

 //}


function write($arr)
{
             //   INPUT
  /*  $arrayName = array('img' =>$image_path ,'text' =>$description ,'price' => $min_price,'model' =>$model ,'brand' =>$brand ,'cat_id'=>$GLOBALS['cat_id'] ,'atr'=>$text_atr,'group_id'=>$GLOBALS['group_id'],'category'=>$catalotype,'list_cat'=>$list_cat );  */
//************


$mysqli = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


/* Вывод текущей кодировки */
$charset = $mysqli->character_set_name();
//printf ("Текущая кодировка - %s\n", $charset);

$mysqli->set_charset("utf8");
		$mysqli->query("SET SQL_MODE = ''");

		/* Вывод текущей кодировки */
$charset = $mysqli->character_set_name();
//printf ("Текущая кодировка - %s\n", $charset);

/* проверка соединения */
if ($mysqli->connect_errno) {
    printf("Не удалось подключиться: %s\n", $mysqli->connect_error);
    exit();
}



//     create cat если надо

 //category    
        //    проход по всем елементам и попытка созадть кетегороию
//          а самый последний проход создаесться елемент
//             и категория  нужен id самой главной категории

//rsort($arr['list_cat']);
//array_pop($arr['list_cat']);
//echo count($arr['list_cat']).PHP_EOL;
array_shift($arr['list_cat']);
//rsort($arr['list_cat']);
$id_cat=$GLOBALS['cat_id'];
foreach ($arr['list_cat'] as $key => $value) {
  # code...
  //      первый пропуск будет ссилаться на маин
     // if ($value === reset($arr['list_cat'])) continue; 
  //echo $value.PHP_EOL;
  echo 'NEW CAT'.PHP_EOL.PHP_EOL;
  $r=is_present_cat($mysqli, $value);
       if ($r != null) {
           # code...
               echo "категория $value есть ид ".$r;     
               $id_cat=$r;         
         } 
         else {
           # code... 
            echo "категории нету";
            $array_to_Category = array('parent_id' => $id_cat ,'name'=>$value,'description'=>'Описнание категории','meta_title'=>'Meta title');
            createCat($mysqli,$array_to_Category);
            $id_cat=  is_present_cat($mysqli, $value);

         }

        // break;
         // создать категорию 



        // createCat($mysqli, $array_to_Category);
                   

    // последний  сат + запись    запись продукта в ету категорию.
   if ($value === end($arr['list_cat'])){





    echo "LAST EL";
   }
//    конец цикал создание категорий
}

/*if(!is_present_cat($mysqli,$arr['category'])){
$array_to_Category = array('parent_id' => 0 ,'name'=>'Ь я категория','description'=>'Описнание категории','meta_title'=>'Meta title');
createCat($mysqli,$array_to_Category);

}*/
      


//    end craaerte cat



$res_img=$arr['img'];
$res_text=$arr['text'];
$res_atr_text=$arr['atr'];


$cat_id=$arr['cat_id']=$id_cat;  // категория.   брать из базы руками. смотреть log_EDIT.prod.txt

$attribute_id=$arr['group_id'];//12;       //      атрибут или група атрибутов брать из базы руками.
//********************
$model=$arr['model'];
$price=$arr['price'];

$xxx="INSERT INTO oc_product SET model = '".$model."', sku = '', upc = '', ean = '', jan = '', isbn = '', mpn = '', location = '', quantity = '999', minimum = '1', subtract = '1', stock_status_id = '6', date_available = '2016-05-02', manufacturer_id = '0', shipping = '1', price = '".$price."', points = '0', weight = '0', weight_class_id = '1', length = '0', width = '0', height = '0', length_class_id = '1', status = '1', tax_class_id = '0', sort_order = '1', date_added = NOW()";
// ok

if ($result = $mysqli->query($xxx)) {
   // printf("Select вернул____ %d строк.\n", $result->num_rows);
 
    //$row = $result->fetch_row();
   // echo "add ok";

}
 
 $last_id=get_last_id($mysqli);
 
 //        for image test
 //$res_img='catalog/d.png';
     
$for_image="UPDATE oc_product SET image = '".$res_img."' WHERE product_id = '".$last_id."'";

//echo "<br>---".$for_image."  --<br>";
if ($result = $mysqli->query($for_image)) {
   // printf("Select вернул____ %d строк.\n", $result->num_rows);
 
    //$row = $result->fetch_row();
   // echo "add image";
 
}

//echo "<br> Descript <br>";
//$may_des= htmlentities(  $res_text);
$may_des= $res_text;
//$may_des=    "Руский Укрраинский English";

//$may_des=htmlentities($may_des, ENT_COMPAT, 'UTF-8');


$may_des='<span>'.$may_des.'</span>';
//$may_des.=$res_atr_text;
//$may_des=htmlentities($may_des, ENT_QUOTES, 'UTF-8');



//$res_atr_text=htmlentities($res_atr_text, ENT_QUOTES, 'UTF-8');


//$may_des=mysqli_real_escape_string ($may_des);
$name_tov_like_model=$arr['model'];
$name_tov_like_model=$arr['category'].$arr['brand'].' '.$arr['model'];
// bran + model
$meta_tag=$arr['brand'].' '.$arr['model'];
$des="INSERT INTO oc_product_description SET product_id = '".$last_id."', language_id = '1', name = '".$name_tov_like_model."', description = '".$may_des."', tag = '', meta_title = '".$meta_tag."', meta_description = '', meta_keyword = ''";
if ($result = $mysqli->query($des)) {
   // printf("Select вернул____ %d строк.\n", $result->num_rows);
 
    //$row = $result->fetch_row();
  //  echo "add desc";
 
}


//    set category

  // prod to lauout
$des="DELETE FROM oc_product_to_layout WHERE product_id = '".$last_id."'";
$result = $mysqli->query($des);
$des="INSERT INTO oc_product_to_layout SET product_id = '".$last_id."', store_id = '0', layout_id = '0'";
$result = $mysqli->query($des);

//       prod to category
$des="DELETE FROM oc_product_to_category WHERE product_id = '".$last_id."'";
$result = $mysqli->query($des);
$des="INSERT INTO oc_product_to_category SET product_id = '".$last_id."', category_id = '".$cat_id."'";
$result = $mysqli->query($des);

//    store 
$des="DELETE FROM oc_product_to_store WHERE product_id = '".$last_id."'";
$result = $mysqli->query($des);
$des="INSERT INTO oc_product_to_store SET product_id = '".$last_id."', store_id = '0'";
$result = $mysqli->query($des);

// атрибут     пока не включать !!!!
$res_atr_text=htmlentities($res_atr_text, ENT_QUOTES, 'UTF-8');
$des="DELETE FROM oc_product_attribute WHERE product_id = '".$last_id."'";
$result = $mysqli->query($des);
$des="DELETE FROM oc_product_attribute WHERE product_id = '".$last_id."' AND attribute_id = '".$attribute_id."'";
$result = $mysqli->query($des);
$des="INSERT INTO oc_product_attribute SET product_id = '".$last_id."', attribute_id = '".$attribute_id."', language_id = '1', text = '".$res_atr_text."'";
$result = $mysqli->query($des);







$result=null;


$mysqli->close();
echo "OK_ ";

}


function createCat($mysqli,$arr)
{

  # code...
 /* INSERT INTO oc_category SET parent_id = '0', `top` = '0', `column` = '1', sort_order = '0', status = '1', date_modified = NOW(), date_added = NOW()*/
$des="INSERT INTO oc_category SET parent_id = '".$arr['parent_id']."', `top` = '0', `column` = '1', sort_order = '0', status = '1', date_modified = NOW(), date_added = NOW()";
$result = $mysqli->query($des);

// take id
$last_id=get_last_id($mysqli);
//echo "ID: ".$last_id;

// ipdate
$des="UPDATE oc_category SET image = '' WHERE category_id = '".$last_id."'";
$result = $mysqli->query($des);


$description= htmlentities($arr['description'], ENT_QUOTES, 'UTF-8');   
$des="INSERT INTO oc_category_description SET category_id = '".$last_id."', language_id = '1', name = '".$arr['name']."', description = '".$description."', meta_title = '".$arr['meta_title']."', meta_description = '', meta_keyword = ''";
$result = $mysqli->query($des);


  
$des="SELECT * FROM `oc_category_path` WHERE category_id = '".$arr['parent_id']."' ORDER BY `level` ASC";
//$query = $mysqli->query($des);

//echo $des.PHP_EOL;
//echo "8888888888888888";
//var_dump($query);
//foreach ($query->rows as $result) {

//var_dump($a);
$level=0;
if ($result = $mysqli->query($des)) {


    /* fetch object array */
     while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        //echo "ID:: ".$row["category_id"].'  ';
        // insert 
        $des="INSERT INTO `oc_category_path` SET `category_id` = '".$last_id."', `path_id` = '".(int)$row["category_id"]."', `level` = '".$level."'";
       // echo PHP_EOL.$des.PHP_EOL;
        // echo "LEVEL ".$level.PHP_EOL.PHP_EOL;
        $mysqli->query($des);
$level++;

    }

   $des="INSERT INTO `oc_category_path` SET `category_id` = '".$last_id."', `path_id` = '".$last_id."', `level` = '".$level."'";
//echo "ID:: ".$last_id.'  ';
 //echo PHP_EOL.$des.PHP_EOL;
   //      echo "LEVEL ".$level.PHP_EOL.PHP_EOL;
        $mysqli->query($des);

    /* free result set */
    $result->close();
}

/*$a= mysqli_fetch_all($query,MYSQLI_ASSOC);

foreach ($a as $row) {
// ---------------------      1
$des="INSERT INTO `oc_category_path` SET `category_id` = '".$last_id."', `path_id` = '".(int)$row['path_id']."', `level` = '".$GLOBALS['level_up']."'";

$res = $mysqli->query($des);

    $GLOBALS['level_up']++;
     // incr dont work ?????
    }
 $GLOBALS['level_up']=0;

*/




// ---------------------    2      for for level 
/*$level=1;
$des="INSERT INTO `oc_category_path` SET `category_id` = '".$last_id."', `path_id` = '".$last_id."', `level` = '".$level."'";
$result = $mysqli->query($des);*/

/*INSERT INTO `oc_category_path` SET `category_id` = '111', `path_id` = '111', `level` = '1'*/

//----------------
$des="INSERT INTO oc_category_to_store SET category_id = '".$last_id."', store_id = '0'";
$result = $mysqli->query($des);

$des="INSERT INTO oc_category_to_layout SET category_id = '".$last_id."', store_id = '0', layout_id = '0'";
$result = $mysqli->query($des);

$keywordrand='efeefe'.rand(1,99999);
$des="INSERT INTO oc_url_alias SET query = 'category_id=".$last_id."', keyword = '".$keywordrand."'";
$result = $mysqli->query($des);


echo "   Cat is create   ";
}


 // проверка на неNULL
function is_present_cat($mysqli, $arr)
{
  # code... 
  //$arr=trim($arr,"\x00..\x1F");
 $sql = "SELECT `category_id` FROM `oc_category_description` WHERE `name`= '".$arr."'";
$id=null;
if ($result = $mysqli->query($sql)) {


    /* fetch object array */
     while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "IDx:: ".$row["category_id"].'  ';
        $res=$row["category_id"];
        //$id=$row["category_id"];
             //echo "IDxduble:: ".$res.'  ';
        return $res;
break;

    }

    /* free result set */
    $result->close();
}




 return null;

}

 // error_log ($data['entry_description'].'\n', 3, "log_DDD.txt");
?>