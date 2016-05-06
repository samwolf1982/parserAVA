<?php
class Debuger {
	/*
	 * only value
	 */
static  function consoleLog($data) {
 $data= var_export($data,true);
echo("<script>console.log('PHP: ".$data."');</script>");
}

/*
 * only Browser windows. any variables
 */
static   function dumper($obj)
{
	echo "<font size=2><Pre>".htmlspecialchars(Debuger::dumperGet($obj))."</pre></font>";
}
static  function dumperGet(&$obj,$leftSP="")
{
	if(is_array($obj)){$type="Array[".count($obj)."]";}
	elseif (is_object($obj)) {$type="Object"; }
	elseif (gettype($obj)=="boolean") {return $obj?"true":"false"; }
	else {return "\"$obj\""; }

	$buf=$type;
	$leftSP.="  ";

	for (reset($obj); list($k,$v)=each($obj);) {
		if($k=="GLOBALS") continue;
		$buf.="\n$leftSP$k => ".Debuger::dumperGet($v,$leftSP);
	}
	return $buf;
}


}