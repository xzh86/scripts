<?php

# usage: php executeSQL.php test.sql
# params: filename(test.sql, like the following 3 lines)
# line1: insert into xzh_test (sid) values('a');
# line2: insert into xzh_test (sid) values('b');
# line3: insert into xzh_test (sid) values('c\'); 

# as a data analyst, a lot of statistical results need to store into database, this php script will helps a lot.


echo $_SERVER["argv"][1];
$sql_file=$_SERVER["argv"][1];

$host="10.11.199.233";
$user="liyangyang";
$pwd="liyangyang";
$db="haoma_stats";

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
						# for some exceptions, for example: character encoding error.
                        $wrongSql="insert into execute_error_history(date,tbl_name,times) values('".$dt."','".$tableName."',1)\n";
                        mysql_query($wrongSql,$link);
                }
        }
}
mysql_close($link);
fclose($myfile);
?>