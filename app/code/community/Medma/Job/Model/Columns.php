<?php    
class Medma_Job_Model_Columns 
{

		const Table_Name = 'job_manager';

		public function addNewColumn($columnName,$require)
		{
				if($require==0)
				{
					$defination = 'varchar(255) null';
				}
				else
				{
					$defination = 'varchar(255) not null';
				}
				$resource = Mage::getSingleton('core/resource');
				$jobTable = $resource->getTableName(Medma_Job_Model_Columns::Table_Name);
				$write = $resource->getConnection('core_write');
				$output = $write->addColumn($jobTable,$columnName,$defination);
				return $output;
		}

		public function fetchColumns()
		{
				$newCol='';
				$resource = Mage::getSingleton('core/resource');
				$jobTable = $resource->getTableName(Medma_Job_Model_Columns::Table_Name);
				$read = $resource->getConnection('core_read');
				$query = 'show columns from '.$jobTable;
				$fields = $read->fetchAll($query);
				$i=0;
				foreach($fields as $field)
				{
					if (strpos($field['Field'],'newcol_') !== false) 
					{
						$newCol[$i]['fieldName'] = $field['Field'];//var_dump($field);exit;

						$name = str_replace('newcol_','',$field['Field']);
						$newCol[$i]['colName'] = ucwords(str_replace('_',' ',$name));
						if($field['Null']==='NO')
						{
							$newCol[$i]['required'] = 'YES';
						}
						else
						{
							$newCol[$i]['required'] = 'NO';
						}

						$i++;
					}
				}
				//exit;
				return $newCol;
		}
		public function dropColumns($columnName)
		{
				$resource = Mage::getSingleton('core/resource');
				$jobTable = $resource->getTableName(Medma_Job_Model_Columns::Table_Name);
				$write = $resource->getConnection('core_write');
				$output = $write->dropColumn($jobTable,$columnName);
				return $output;
		}
		public function changeColumn($oldcolumnName,$newcolumnName,$require)
		{
				if($require==0)
				{
					$defination = 'varchar(255) null';
				}
				else
				{
					$defination = 'varchar(255) not null';
				}
				$resource = Mage::getSingleton('core/resource');
				$jobTable = $resource->getTableName(Medma_Job_Model_Columns::Table_Name);
				$write = $resource->getConnection('core_write');
				$output = $write->changeColumn($jobTable,$oldcolumnName,$newcolumnName,$defination);
				return $output;
		}
}
