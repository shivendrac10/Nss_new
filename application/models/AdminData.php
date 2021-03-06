<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class AdminData extends CI_Model
{
    public function __construct()
	{
		parent::__construct();
	}

	/* 
		This function checks if the email exists in the database
	*/
	public function check_email($email) 
	{
		if($email) {
			$sql = 'SELECT * FROM users WHERE email = ?';
			$query = $this->db->query($sql, array($email));
			$result = $query->num_rows();
			return ($result == 1) ? true : false;
		}

		return false;
	}

	/* 
		This function checks if the email and password matches with the database
	*/

	public function login($email, $password) {
		if($email && $password) {
			$sql = "SELECT * FROM users WHERE email = ?";
			$query = $this->db->query($sql, array($email));

			if($query->num_rows() == 1) {
				$result = $query->row_array();
				return $result;
				
			}
			else {
				return false;
			}
		}
	}

	//overall response

	public function total_responses()
	{
		//SELECT count(*) FROM `volunteer` 
		return $this->db->count_all_results('volunteer');
	}

	//current response

	public function currentResponse_total()
	{
		$q = $this->db->where('timestamp', idate('Y'));
		return $q->count_all_results('volunteer');
	}

	//Use for pagination in list page
	public function fetch_list($limit, $start) {
        $this->db->limit($limit, $start);
		$query = $this->db->get("volunteer");
		return $query->result();

   }

	public function all()
	{
		$this->db->order_by('name', 'ASC');
		$users = $this->db->get('volunteer')->result_array();
		return $users;
	}

	public function getUser($userID)
	{
		$this->db->where('sno', $userID);
		$user = $this->db->get('volunteer')->row_array();
		return $user;
	}

	public function updateuser($userID, $formArray)
	{
		$this->db->where('sno', $userID);
		$this->db->update('volunteer', $formArray);
	}

	public function deleterow($userID){
		$sql_query=$this->db->where('sno', $userID)
						->delete('volunteer');
				   if($sql_query){
		$this->session->set_flashdata('success', 'Record delete successfully');
		redirect('Dashboard/currentList');
			}
			else{
				$this->session->set_flashdata('failure', 'Somthing went worng. Error!!');
				redirect('Dashboard/currentList');
			}
	}
	
	public function currentResponses()
	{
		date_default_timezone_set('Asia/Calcutta');
		$this->db->where('timestamp', idate('Y'))->order_by('name', 'ASC');
		$currentRes = $this->db->get('volunteer')->result_array();
		return $currentRes;
	}

	//Total summary session

	public function getTotalmale()
	{
		return $this->db->where('gender', 'Male')->count_all_results('volunteer');
	}

	public function getTotalfemale()
	{
		return $this->db->where('gender', 'Female')->count_all_results('volunteer');
		
	}

	public function getTotalSummary()
	{
		return $this->db->count_all_results('volunteer');
	}

	public function year1()
	{
		return $this->db->where("class", "1st")->count_all_results('volunteer');
	}

	public function year2()
	{
		return $this->db->where("class", "2nd")->count_all_results('volunteer');
	}

	public function year3()
	{
		return $this->db->where("class", "3rd")->count_all_results('volunteer');
	}

	public function year4()
	{
		return $this->db->where("class", "4th")->count_all_results('volunteer');
	}

	
	//Google pie chart function

	public function category()
	{
		$sql="SELECT category, count(*) FROM `volunteer` GROUP BY category";
		$query = $this->db->query($sql);
		$result = $query->result_array();         // Returns the result as an array
		return $result;

	}

	public function nssYear()
	{
		$sql="SELECT nssYear, count(*) FROM `volunteer` GROUP BY nssYear";
		$query = $this->db->query($sql);
		$result = $query->result_array();         // Returns the result as an array
		return $result;
	}

	public function branch()
	{
		$sql="SELECT branch, count(*) FROM `volunteer` GROUP BY branch";
		$query = $this->db->query($sql);
		$result = $query->result_array();         // Returns the result as an array
		return $result;
	}

	//Insert a registration date in RegisterVar table
	public function registerVar($dateTime)
	{
		$this->db->set('regisDate', $dateTime);
		$this->db->where('id', 1);
		$this->db->update('registerVar'); // gives UPDATE `mytable` SET `registerDate` = 'dateTime' WHERE `id` = 1
		
		// if($sql_query){
		// 	$this->session->set_flashdata('success', 'Date & Time Updated Successfully');
		// 	redirect('Dashboard/nssRegisUpdate');
		// 		}
		// 		else{
		// 			$this->session->set_flashdata('failure', 'Somthing went worng. Error!!');
		// 			redirect('Dashboard/nssRegisUpdate');
		// 		}
	}

}



?>