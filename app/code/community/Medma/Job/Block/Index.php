<?php   
class Medma_Job_Block_Index extends Mage_Core_Block_Template{   

	public function getPostUrl($destination)
	{
		return $this->getUrl($destination);
	}
}


?>
