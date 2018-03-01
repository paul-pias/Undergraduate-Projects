<?php
class User_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}
	//get contact details for a particular flat/room
	public function getContact($entityId, $type) {
		if ($type == 0) {
			$user_sql = "SELECT UID FROM USER_FLAT WHERE FID=".$entityId;
		}
		else {
			$user_sql = "SELECT UID FROM USER_ROOM WHERE RID=".$entityId;
		}
		$query = $this->db->query($user_sql);

		if ($query->result_array()) {
			$userId = $query->result_array()[0]['UID'];
			$sql = "SELECT PHONE_NO, CONTACT_TIME FROM USER WHERE USER_ID=".$userId;
			$query = $this->db->query($sql);

			return $query->result_array();
		}
	}

	//get user info. from database
	public function getUserInfo($userId) {
		$sql = "SELECT * FROM USER WHERE USER_ID=".$userId;
		$query = $this->db->query($sql);

		return $query->result_array()[0];
	}

	//get all room info. of a user from database
	public function getRoomInfo($userId) {
		$user_sql = "SELECT RID FROM USER_ROOM WHERE UID=".$userId;
		$query = $this->db->query($user_sql);

		foreach ($query->result_array() as $value) {
			$room_sql = "SELECT * FROM ROOM F JOIN RENT R ON R.RENT_ID=F.RENT_ID WHERE ROOM_ID=".$value['RID'];
			$room_query = $this->db->query($room_sql);
			$data[] = $room_query->result_array()[0];
		}
		if(isset($data))
			return $data;
		else
			return false;
	}

	//get all flat info. of a user from database
	public function getFlatInfo($userId) {
		$user_sql = "SELECT FID FROM USER_FLAT WHERE UID=".$userId;
		$query = $this->db->query($user_sql);

		foreach ($query->result_array() as $value) {
			$flat_sql = "SELECT * FROM FLAT F JOIN RENT R ON R.RENT_ID=F.RENT_ID WHERE FLAT_ID=".$value['FID'];
			$flat_query = $this->db->query($flat_sql);
			$data[] = $flat_query->result_array()[0];
		}
		if(isset($data))
			return $data;
		else
			return false;
	}

	//add a flat listing under a user ID
	public function addFlatDb($data) {
		$checkboxValues = array_fill(1, 7, 0);

		foreach ($data['checkboxValues'] as $key => $value) {
			$checkboxValues[$value] = 1;
		};

		$rent_sql = "INSERT INTO RENT(BASE_RENT, SERVICE_CHARGE, ADVANCE) VALUES (".$this->db->escape($data['BASE_RENT']*1).", ".$this->db->escape($data['SERVICE_CHARGE']!='' ? $data['SERVICE_CHARGE']*1 : NULL).", ".$this->db->escape($data['ADVANCE']!='' ? $data['ADVANCE']*1 : NULL).")";

		$this->db->query($rent_sql);
		$rent_id = $this->db->insert_id();

		$flat_sql = "INSERT INTO FLAT(GAS, LIFT, NUMBER_OF_WASHROOM, NUMBER_OF_BALCONY, NUMBER_OF_BEDROOM, GENERATOR, DRAWING_ROOM, DINING_ROOM, SERVANT_ROOM, SQ_FEET, AVAILIBILITY, PICTURE, FURNISHED, RENT_ID, ADDRESS, TERMS, POSTAL_CODE) VALUES (".$this->db->escape($checkboxValues[1]).",".$this->db->escape($checkboxValues[2]).",".$this->db->escape($data['NUMBER_OF_WASHROOM']*1 ? $data['NUMBER_OF_WASHROOM']!='' : NULL).",".$this->db->escape($data['NUMBER_OF_BALCONY']!='' ? $data['NUMBER_OF_BALCONY']*1 : NULL).",".$this->db->escape($data['NUMBER_OF_BEDROOM']!='' ? $data['NUMBER_OF_BEDROOM']*1 : NULL).",".$this->db->escape($checkboxValues[3]).",".$this->db->escape($checkboxValues[4]).",".$this->db->escape($checkboxValues[5]).",".$this->db->escape($checkboxValues[6]).",".$this->db->escape($data['SQ_FEET']*1).","."1".",".$this->db->escape("").",".$checkboxValues[7].",".$rent_id.",".$this->db->escape(ucwords(strtolower($data['ADDRESS']))).",".$this->db->escape($data['TERMS']).",".$this->db->escape($data['POSTAL_CODE']*1).")";

		$this->db->query($flat_sql);
		$flat_id = $this->db->insert_id();

		$flat_user_track = array(
			'UID' => $data['userId'],
			'FID' => $flat_id
			);

		$this->db->insert('USER_FLAT', $flat_user_track);

		$entity_data = array(
			'RID_FID' => $flat_id,
			'Type' => 0
			);
		$this->db->insert('ENTITY', $entity_data);
	}

	//add a room listing under a user ID
	public function addRoomDb($data) {
		$checkboxValues = array_fill(1, 10, 0);

		foreach ($data['checkboxValues'] as $key => $value) {
			$checkboxValues[$value] = 1;
		};

		$rent_sql = "INSERT INTO RENT(BASE_RENT, SERVICE_CHARGE, ADVANCE) VALUES (".$this->db->escape($data['BASE_RENT']*1).", ".$this->db->escape($data['SERVICE_CHARGE']!='' ?  $data['SERVICE_CHARGE']*1 : NULL).", ".$this->db->escape($data['ADVANCE']!= '' ? $data['ADVANCE']*1 : NULL).$this->db->escape($data['ADVANCE']!= '' ? $data['WIFI_CHARGE']*1 : NULL).")";

		$this->db->query($rent_sql);
		$rent_id = $this->db->insert_id();

		$flat_sql = "INSERT INTO ROOM(SERVANT, TV, NUMBER_OF_MEMBERS, BALCONY, ATTACHED_WASHROOM, WIFI, SHARABLE, MEAL_SYSTEM, FILTER, FRIDGE, TERMS, RENT_ID, ADDRESS, AVAILIBILITY, POSTAL_CODE, PICTURE) VALUES ("
    	.$this->db->escape($checkboxValues[1]).
    	",".$this->db->escape($checkboxValues[3]).
    	",".$this->db->escape((int)$data['NUMBER_OF_MEMBERS']).
    	",".$this->db->escape($checkboxValues[4]).
    	",".$this->db->escape($checkboxValues[5]).
    	",".$this->db->escape($checkboxValues[6]).
    	",".$this->db->escape($checkboxValues[7]).
    	",".$this->db->escape($checkboxValues[8]).
    	",".$this->db->escape($checkboxValues[9]).
    	",".$this->db->escape($checkboxValues[10]).
    	",".$this->db->escape($data['TERMS']).
    	",".$this->db->escape($rent_id).
    	",".$this->db->escape(ucwords(strtolower($data['ADDRESS']))).
    	",".$this->db->escape(1).
    	",".$this->db->escape((int)$data['POSTAL_CODE']).
    	",".$this->db->escape("").")";

    	$this->db->query($flat_sql);
    	$room_id = $this->db->insert_id();

    	$room_user_track = array(
    		'UID' => $data['userId'], 
    		'RID' => $room_id
    		);

    	$this->db->insert('USER_ROOM', $room_user_track);

    	$entity_data = array(
    		'RID_FID' => $room_id,
    		'Type' => 1
    	);
    	$this->db->insert('ENTITY', $entity_data);
	}
}