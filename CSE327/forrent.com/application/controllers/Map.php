<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Map extends CI_Controller
{
	public function __construct()
	{
		# code...
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Home_model');
		//$this->load->model('Map_model'); ///need to update map model
		$this->load->library('form_validation');

	}

	public function index(){
		//get data from sidebar
		$direction  = array(
			array('field'=> 'LOCATION_SEARCH','label'=>'','rules'=>''),
			array('field'=> 'START','label'=>'','rules'=>''),
			array('field'=>'END','label'=>'','rules'=>'') );
		$directions["info"] = $this->input->post_values($direction);

		//load data from home model
		$data["results"]=$this->Home_model->get_home_info();

		if ($directions['info']['LOCATION_SEARCH']!=false):
			$center = $directions['info']['LOCATION_SEARCH'];
		else:
			$center = '23.81510332922701,90.42553782463074';//"dhaka";
		endif;
	
		//map work
		$this->load->library('googlemaps');   

		$config['center']=$center;//'23.8149 , 90.4260';  
		$config['zoom']=14;//'auto';
		$config['onclick']='alert(\'Your clicked position(Latitude, Longitude): \' + event.latLng.lat()+\',\'+ event.latLng.lng());';
		$config['directions']=TRUE;
		$config['directionsDraggable']=TRUE;
		$config['directionsStart']=$directions['info']['START']; //'23.8149 , 90.4260';
		$config['directionsEnd']=$directions['info']['END']; //'23.816747, 90.428165';
		$config['directionsDivID']='directionsDiv';  

		$this->googlemaps->initialize($config);

		//for marker
		if ($data!= false):
			foreach($data["results"] as $datas):
				$marker=array();
				$marker['position']=$datas['info']['ADDRESS'];
				$marker['animation']="DROP";
				$marker["draggable"]=TRUE;
				$marker['icon']='http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';			
				
				if ($datas['TYPE']==0):
					$url=base_url("flat/").$datas['info']['FLAT_ID'];
					
					$marker['infowindow_content']='Flat:'.$datas['info']['BASE_RENT'].' tk, '.$datas['info']['SQ_FEET'].' sqf, '.$datas['info']['NUMBER_OF_BEDROOM'].' rooms '.'<button type="button" class="btn btn-success"><a style="color: white;text-decoration: none;" href="'.$url.'">View Details</a></button>';
				else:
					$url=base_url("room/").$datas['info']['ROOM_ID'];
					$sa=$datas['info']['SHARABLE']==1 ? "Yes":"No";
					
					$marker['infowindow_content']='Room:'.$datas['info']['BASE_RENT'].' tk, '.$datas['info']['NUMBER_OF_MEMBERS'].' members, Shareable: '.$sa.' '.'<button type="button" class="btn btn-success"><a style="color: white;text-decoration: none;" href="'.$url.'">View Details</a></button>';
				
				endif;
				$this->googlemaps->add_marker($marker);
			endforeach;
		endif;

		//create a map
		$data['map']=$this->googlemaps->create_map();

		if ($this->session->userdata('logged_in')) {
			$data['username'] = $this->session->userdata('username');
			$this->load->view('templates/headerUser', $data);
			$this->load->view('showMap',$data);
			$this->load->view('templates/mapsidebar',$data);
			$this->load->view('templates/footer');
		}
		else {
			$this->load->view('templates/header');
			$this->load->view('showMap',$data);
			$this->load->view('templates/mapsidebar',$data);
			$this->load->view('templates/footer');
		}
		

	}
}