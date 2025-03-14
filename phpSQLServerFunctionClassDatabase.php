<?php
	/**** Class Database ****/
	Class MyDatabase
	{
		/**** function connect to database ****/
		function MyDatabase($strHost,$strDB,$strUser,$strPassword)
		{
				$this->objConnect = mssql_connect($strHost,$strUser,$strPassword);
				$this->DB = mssql_select_db($strDB);
		}

		/**** function insert record ****/
		function fncInsertRecord()
		{
				$strSQL = "INSERT INTO $this->strTable ($this->strField) VALUES ($this->strValue) ";
				return mssql_query($strSQL);
		}

		/**** function select record ****/
		function fncSelectRecord()
		{
				$strSQL = "SELECT * FROM $this->strTable WHERE $this->strCondition ";
				$objQuery = @mssql_query($strSQL);
				return @mssql_fetch_array($objQuery);
		}

		/**** function update record (argument) ****/
		function fncUpdateRecord($strTable,$strCommand,$strCondition)
		{
				$strSQL = "UPDATE $strTable SET  $strCommand WHERE $strCondition ";
				return @mssql_query($strSQL);
		}

		/**** function delete record ****/
		function fncDeleteRecord()
		{
				$strSQL = "DELETE FROM $this->strTable WHERE $this->strCondition ";
				return @mssql_query($strSQL);
		}

		/*** end class auto disconnect ***/
		function __destruct() {
				return @mssql_close($this->objConnect);
	    }
	}			

?>