<?php
/**
 * Created by PhpStorm.
 * User: kelvin
 * Date: 10/15/14
 * Time: 7:10 AM
 */

$conn = mysql_connect("localhost","root","kevdom");
mysql_select_db("NGOdb");
$query = mysql_query('select * from `NGO Information`') or die(mysql_error());
while($row = mysql_fetch_array($query)){
    $query2 = mysql_query("select * from NGOs WHERE name='".mysql_real_escape_string($row['NGOName'])."'") or die(mysql_error());
    if(mysql_num_rows($query2) == 0){
        $query11 = mysql_query("INSERT INTO NGOs VALUES (
            '{$row['NGOID']}',
            '".mysql_real_escape_string($row['NGOName'])."',
            '".mysql_real_escape_string($row['RegNo'])."',
            '".mysql_real_escape_string($row['CompNo'])."',
            '',
            '',
            '".mysql_real_escape_string($row['OpLevel'])."',
            '".mysql_real_escape_string($row['POBoxNO'])."',
            '".mysql_real_escape_string($row['PhysiAddress'])."',
            '1',
            '1',
            '".mysql_real_escape_string($row['BusiPhone'])."',
            '".mysql_real_escape_string($row['E-mail'])."',
            '".mysql_real_escape_string($row['PrioSector'])."',
            '2010-12-31 00:00:00',
            '2010-12-31 00:00:00'
         )") or die(mysql_error());


    }

    $query12 = mysql_query("INSERT INTO annual_report VALUES (
      '',
      '',
      '',
      '',
    )");

}