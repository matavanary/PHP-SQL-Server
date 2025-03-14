<html>
<head>
<title>ThaiCreate.Com PHP & SQL Server Tutorial</title>
</head>
<body>
<?php
include("phpSQLServerFunctionClassDatabase.php");

// New class database 
$strHost = "RK-168N\SQLEXPRESS";
$strDB = "mydatabase";
$strUser = "";
$strPassword = "";
$clsMyDB = new MyDatabase($strHost,$strDB,$strUser,$strPassword);



// Call to class function insert record 
$clsMyDB->strTable = "customer";
$clsMyDB->strField = "CustomerID,Name,Email,CountryCode,Budget,Used";
$clsMyDB->strValue = " 'C005','Weerachai Nukitram','webmaster@thaicreate.com','TH','2000000','0' ";
$objInsert = $clsMyDB->fncInsertRecord();
if(!$objInsert)
{
	echo "Record already exist.<br>";
}
else
{
	echo "Record inserted.<br>";
}

echo "<br>===========================<br>";



// Call to function select record
$clsMyDB->strTable = "customer";
$clsMyDB->strCondition = " CustomerID = 'C005' ";
$objSelect = $clsMyDB->fncSelectRecord();
if(!$objSelect)
{
	echo "Record not found<br>";
}
else
{
	echo "Customer Detail.<br>";
	echo "CustomerID = $objSelect[CustomerID]<br>";
	echo "Name = $objSelect[Name]<br>";
	echo "Email = $objSelect[Email]<br>";
	echo "CountryCode = $objSelect[CountryCode]<br>";
	echo "Budget = $objSelect[Budget]<br>";
	echo "Used = $objSelect[Used]<br>";
}

echo "<br>===========================<br>";



// Call to function update record (argument)
$strTable = "customer";
$strCommand = " BUDGET = '4000000' ";
$strCondition = " CustomerID = 'C005' ";
$objUpdate = $clsMyDB->fncUpdateRecord($strTable,$strCommand,$strCondition);
if(!$objUpdate)
{
	echo "Error update record.<br>";
}
else
{
	echo "Record updated.<br>";
}

echo "<br>===========================<br>";



// Call to function delete record 
$clsMyDB->strTable = "customer";
$clsMyDB->strCondition = " CustomerID = 'C005' ";
$objDelete = $clsMyDB->fncDeleteRecord();
if(!$objDelete)
{
	echo "Record not delete.<br>";
}
else
{
	echo "Record deleted.<br>";
}
?>
</body>
</html>