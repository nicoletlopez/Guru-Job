<?php
/*
$ip = "123_456_789_000.gse2"; // some IP address
$iparr = preg_split("/\_/", $ip);
$withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $ip);
$splits=preg_split("/\_/",$withoutExt,-1,PREG_SPLIT_NO_EMPTY);

print "$withoutExt <br/>";
for($i=0;$i<count($splits);$i++){
print $splits[$i] . "<br/>";
    }

print "$iparr[0] <br />";
print "$iparr[1] <br />" ;
print "$iparr[2] <br />"  ;
print "$iparr[3] <br />"  ;
*/

$word="123_456_7sASDdfsdf89_004353453450.gse3";
$wordReplace=preg_replace("/(_)(\d+)(?!.*(_)(\d+))/",'',$word);

print $wordReplace;
//$splitWord=eregi("/_\d+/",$word);
/*
for($i=0;$i<count($splitWord);$i++){
    print $splitWord[$i] . "<br/>";
}
*/

?>