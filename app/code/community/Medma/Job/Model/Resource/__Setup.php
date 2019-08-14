<?php 

class Medma_Job_Model_Resource_Setup extends Mage_Core_Model_Resource_Setup
{

		public function addNewColumn()
		{
				/*$installer = new Mage_Core_Model_Resource_Setup('job_setup');
				$connection = $installer->getConnection();
				$installer->startSetup();
				$installer->getConnection()
						->addColumn($installer->getTable('job_manager'),
						'test',Varien_Db_Ddl_Table::TYPE_VARCHAR, 255,
						array(
								'type' => 'text',
								'nullable' => true,
								'default' => null,
						)
				);
				$installer->endSetup();*/

				echo $this->getTable('job_manager');
		}

}
?>
