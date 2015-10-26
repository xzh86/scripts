<?php

echo $_SERVER["argv"][1];
$sql_file=$_SERVER["argv"][1];

$host="xz";
$user="xz";
$pwd="xz";
$db="xz";

$tableName="";

$link = mysql_connect($host,$user,$pwd);
mysql_select_db($db);

#$myfile = fopen("test.sql", "r") or die("Unable to open file!");
$myfile = fopen($sql_file, "r") or die("Unable to open file!");
while(!feof($myfile)) {
        $sql=fgets($myfile);
        if (strlen($sql)>5)
        {
                $result = mysql_query($sql,$link);
                if (!$result)
                {
                        $dt=date("Ymd");
                        $wrongSql="insert into execute_error_history(date,tbl_name,times) values('".$dt."','".$tableName."',1)\n";
                        mysql_query($wrongSql,$link);
                }
        }
}
mysql_close($link);
fclose($myfile);
?>
