<?php  

/**
* Description class for switch output
*
* @author puterakahfi
*/

class DisplayHook 
{
	
	public function captureOutput()
	{
		$this->CI = &get_instance();
		$output = $this->CI->output->get_output();
		if (ENVIRONMENT != 'testing'){
			echo $output;
		}
	}
}
?>