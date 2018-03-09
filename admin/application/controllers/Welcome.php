<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function export(){
	 $this->load->view("exportdata");
	}
	public function index() {
            $this->load->view('Index');
    }
  	public function Excel() {
  		$this->load->library('Excel');
		$file=FCPATH."uploads\Book1.xlsx";
		$obj=PHPExcel_IOFactory::load($file);
		$cell=$obj->getActiveSheet()->getCellCollection();
		foreach($cell as $cl){
			$column=$obj->getActiveSheet()->getCell($cl)->getColumn();
			$row=$obj->getActiveSheet()->getCell($cl)->getRow();
			$data_value=$obj->getActiveSheet()->getCell($cl)->getValue();
			
			if($row==1){
				$header[$row][$column]=$data_value;
			}else{
				$arr_data[$row][$column]=$data_value;
			}
		}
		$data['header']=$header;
		$data['values']=$arr_data;
            $this->load->view('exceldata',$data);
    }
      
}
