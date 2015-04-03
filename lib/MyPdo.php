<?php
	class MyPdo
	{
		private static $inst;
		private static $conn;
		private static $sql;
		private static $arr = array();
		
		private function __construct()
		{
		
		}
		
		public static function Command($host, $user, $pass, $dbname)
		{
			if ( self::$inst === null )
			{
				self::$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
				self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$inst = new MyPdo();
			}
			//self::$arr = $data;
			return self::$inst;
		}
		
		private function dbResultToArray($stmt)
		{
			$res_array = array();
			$count = 0;
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$res_array[$count] = $row;
				$count++;
			}
			return $res_array;
		}
		
		public static function Select($fld)
		{
			self::$arr['field'] = $fld;
			self::$sql = 'Select ' . self::$arr['field'];
			return self::$inst;
		}
		
		public static function From($tbl)
		{
			self::$arr['table'] = $tbl;
			self::$sql .= ' From ' . self::$arr['table'];
			return self::$inst;
		}
		
		public static function Where($where, $val)
		{
			self::$arr['where'] = $where;
			self::$arr['val'] = $val;
			self::$sql .= ' Where ' . self::$arr['where']. ':val';
			return self::$inst;
		}
		
		public static function Limit($lmt)
		{
			self::$arr['limit'] = $lmt;
			self::$sql .= ' Limit ' . self::$arr['limit'];
			return self::$inst;
		}
		
		public static function Execute()
		{
			$stmt = self::$conn->prepare(self::$sql);
			$stmt->bindparam(':val', self::$arr['val']);
			$stmt->execute();
			if ($stmt->rowCount() > 0)
			{
				$rezult = self::dbResultToArray($stmt);
				return $rezult;
			}
			return $stmt;
		}	
	}