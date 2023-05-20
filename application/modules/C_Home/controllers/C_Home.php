<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_Home extends BaseController
{

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

	/**
	 * [__construct description]
	 *
	 * @method __construct
	 */
	private $_table = "ch_gen_tbl_user";
	public function __construct()
	{
		// Load the constructer from MY_Controller
		parent::__construct();
		if (!$this->session->userdata('userId')) {
			redirect('login');
		}
	}

	/**
	 * [index description]
	 *
	 * @method index
	 *
	 * @return [type] [description]
	 */
	public function index()
	{
		$this->load->view('index');
	}

	public function Authorize()
	{


		$param = $this->input->post();
		$this->db->where('userid', $param['uname']);
		$query = $this->db->get($this->_table);
		$user = $query->row();



		// cek apakah user sudah terdaftar?
		if (!$user) {
			echo json_encode(["message" => "user tidak dikenal"]);
			die;
		}

		// cek apakah passwordnya benar?
		if (md5(sha1(strtolower($param['password']))) != $user->userpassword) {
			echo json_encode(["message" => "password login anda salah"]);
			die;
		}

		$this->session->set_userdata('userId', $user->userid);
		$this->session->set_userdata('factoryId', $user->firstname);
		$this->session->set_userdata('groupId', $user->groupid);


		echo json_encode(true);
	}
}