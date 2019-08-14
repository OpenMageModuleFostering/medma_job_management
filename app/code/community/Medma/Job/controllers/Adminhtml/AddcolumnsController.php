<?php
class Medma_Job_Adminhtml_AddcolumnsController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction()
	{				
		$this->loadLayout(); 
		$this->_setActiveMenu('job/addcolumns');
		$this->_addBreadcrumb($this->__('Add columns'), $this->__('Add columns')); 
	    $this->renderLayout();
	}	
	public function saveAction()
	{
		try
		{
			$columnName = $this->getRequest()->getParam('add_col');
			$columnName = str_replace(' ','_',strtolower($columnName));
			$columnName = 'newcol_'.$columnName;
			
			$require = $this->getRequest()->getParam('requiredCol');

			$output = Mage::getModel('job/columns')->addNewColumn($columnName,$require);
			//var_dump($output);exit;
			if($output instanceof Varien_Db_Statement_Pdo_Mysql)
			{
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('job')->__('Column added successfully'));
			}
			else if($output===true)
			{
				Mage::getSingleton('adminhtml/session')->addError(Mage::helper('job')->__('The column name already exist'));
			}
			else
			{
				Mage::getSingleton('adminhtml/session')->addError(Mage::helper('job')->__('Column is not added successfully'));
			}
		}
		catch(Exception $e)
		{
			Mage::getSingleton('adminhtml/session')->addError($e);
		}
		return $this->_redirectUrl($this->getUrl('job/adminhtml_managecolumns'));
	}
}
?>
