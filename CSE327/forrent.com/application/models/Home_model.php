<?php
class Home_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	public function record_count(){
		return $this->db->count_all("ENTITY");
	}

	public function get_home_info() {
		$sql = "SELECT RID_FID, TYPE FROM ENTITY ORDER BY ID DESC";

		$query = $this->db->query($sql);

		if ($query->num_rows() > 0){
			foreach ($query->result_array() as $row){
				if($row['TYPE'] == 0) {
					$flat_sql = "SELECT F.FLAT_ID, F.NUMBER_OF_BEDROOM, F.SQ_FEET, F.ADDRESS, R.BASE_RENT FROM".
					" FLAT F JOIN RENT R ON F.RENT_ID=R.RENT_ID WHERE F.AVAILIBILITY=1 AND F.FLAT_ID=".$this->db-> escape($row['RID_FID']);

					$flat_query = $this->db->query($flat_sql);

					if ($flat_query->first_row('array')){
						$data[] = array(
							'info' => $flat_query-> first_row('array'),
							'TYPE' => $row['TYPE']);
					}
				}
				else {
					$room_sql = "SELECT F.ROOM_ID, F.NUMBER_OF_MEMBERS, F.SHARABLE, F.ADDRESS, R.BASE_RENT FROM".
					" ROOM F JOIN RENT R ON F.RENT_ID=R.RENT_ID WHERE F.AVAILIBILITY=1 AND F.ROOM_ID=".$this->db->escape($row['RID_FID']);

					$room_query = $this->db->query($room_sql);
					if ($room_query->first_row('array')) {
						$data[] = array(
							'info' => $room_query-> first_row('array'),
							'TYPE' => $row['TYPE']);
					}
				}
			}
			return $data;
		}
		return false;
	}

	public function get_search_result($data){
		$t = strtolower($data["search"]["TYPE_SEARCH"]);
		$sql = "SELECT RID_FID, TYPE FROM ENTITY ".($t!="" ? ("WHERE TYPE=".($t=='flat' ? 0 : 1))  : $t)." ORDER BY ID DESC";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
        	foreach ($query->result_array() as $row) {
        		if ($row['TYPE'] == 0) {
        			        $flat_sql = "SELECT F.FLAT_ID, F.NUMBER_OF_BEDROOM, F.SQ_FEET, F.ADDRESS, R.BASE_RENT FROM"." FLAT F JOIN RENT R ON F.RENT_ID=R.RENT_ID WHERE F.AVAILIBILITY=1 AND F.FLAT_ID=".$this->db->escape($row['RID_FID']).(empty($data["search"]["BASE_RENT_SEARCH"]) ? "" : (" AND   R.BASE_RENT<=".$data["search"]["BASE_RENT_SEARCH"]*1)).(empty($data["search"]["NUMBER_OF_BEDROOM_SEARCH"]) ? "" : (" AND F.NUMBER_OF_BEDROOM=".$data["search"]["NUMBER_OF_BEDROOM_SEARCH"]*1)).(empty($data["search"]["SQ_FEET_SEARCH"]) ? "" : (" AND F,SQ_FEET>=".$data["search"]["SQ_FEET_SEARCH"]*1)).(empty($data["search"]["LOCATION_SEARCH"]) ? "" : (" AND F.ADDRESS LIKE ".$this->db->escape("%".ucfirst(strtolower($data["search"]["LOCATION_SEARCH"]))."%")));

        			        $flat_query = $this->db->query($flat_sql);

        			        if ($flat_query->first_row('array')) {
        			        	$data[] = array(
        			        		'info' => $flat_query->first_row('array') ,
        			        		'TYPE' => $row['TYPE']);
        			        }
        		}
        		else if ($row['TYPE'] == 1 and empty($data["search"]["NUMBER_OF_BEDROOM_SEARCH"])){
        			$room_sql = "SELECT F.ROOM_ID, F.NUMBER_OF_MEMBERS, F.SHARABLE, F.ADDRESS, R.BASE_RENT FROM".
        			" ROOM F JOIN RENT R ON F.RENT_ID=R.RENT_ID WHERE F.AVAILIBILITY=1 AND F.ROOM_ID=".$this->db->escape($row['RID_FID']).(empty($data["search"]["BASE_RENT_SEARCH"]) ? "" : (" AND R.BASE_RENT<=".$data["search"]["BASE_RENT_SEARCH"]*1)).(empty($data["search"]["LOCATION_SEARCH"]) ? "" : (" AND F.ADDRESS LIKE ".$this->db->escape("%".ucfirst(strtolower($data["search"]["LOCATION_SEARCH"]))."%")));

        			$room_query = $this->db->query($room_sql);
        			if ($room_query->first_row('array')) {
        				$data[] = array(
        				    'info' => $room_query->first_row('array')     ,
        				    'TYPE' => $row['TYPE'])    ;
        			}
        		}
        	}
        	return $data;
        }
        return false;
	}


	public function get_flat_info($id) {
		$sql = "SELECT * FROM FLAT F JOIN RENT R ON F.RENT_ID=R.RENT_ID WHERE F.FLAT_ID=".$id;

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_room_info($id) {
		$sql = "SELECT * FROM ROOM F JOIN RENT R ON F.RENT_ID=R.RENT_ID WHERE F.ROOM_ID=".$id;

		$query = $this->db->query($sql);
		return $query->result_array();
	}
}