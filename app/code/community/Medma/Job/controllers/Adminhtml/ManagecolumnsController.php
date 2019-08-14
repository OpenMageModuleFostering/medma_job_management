<?php
class Medma_Job_Adminhtml_ManagecolumnsController extends Mage_Adminhtml_Controller_Action
{

	public function indexAction()
	{
		$this->loadLayout(); 
		$this->_setActiveMenu('job/managecolumns');
		$this->renderLayout();
	}
	public function editAction()
	{
		$this->loadLayout(); 
		$this->_setActiveMenu('job/managecolumns');
		$this->renderLayout();
	}
	public function deleteAction()
	{
		$delColumns = $this->getRequest()->getParam('delColumns');
		try{
			if($delColumns)
			{
				foreach($delColumns as $delColumn)
				{
					Mage::getModel('job/columns')->dropColumns($delColumn);
				}	
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('job')->__('Column(s) deleted successfully'));
				
			}
			else
			{
				Mage::getSingleton('adminhtml/session')->addError(Mage::helper('job')->__('Please select a column'));
			}
		}
		catch(Exception $e)
		{
			Mage::getSingleton('adminhtml/session')->addError($e);
		}
		return $this->_redirect('*/*');
	}
	public function editcolAction()
	{
		try
		{
			$columnsInfo = $this->getRequest()->getParams();

			$oldcolumnName = $columnsInfo['fieldName'];

			$newcolumnName = str_replace(' ','_',strtolower($columnsInfo['add_col']));
			$newcolumnName = 'newcol_'.$newcolumnName;
			
			$require = $columnsInfo['requiredCol'];

			$output = Mage::getModel('job/columns')->changeColumn($oldcolumnName,$newcolumnName,$require);
			
			Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('job')->__('Column edited successfully'));
			
		}
		catch(Exception $e)
		{
			Mage::getSingleton('adminhtml/session')->addError($e);
		}
		return $this->_redirect('*/*');
	}		
}
?>
