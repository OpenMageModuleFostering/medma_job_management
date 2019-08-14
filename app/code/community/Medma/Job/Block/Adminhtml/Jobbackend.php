<?php  

class Medma_Job_Block_Adminhtml_Jobbackend extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_jobbackend';
    $this->_blockGroup = 'jobbackend';
    $this->_headerText = Mage::helper('job')->__('Job Management');
    $this->_addButtonLabel = Mage::helper('job')->__('Add job');
    parent::__construct();
  }
}

?>
