<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url', 'form');
		$this->load->model('UsuarioSQL');
	}

	function index()
	{
		$this->load->view('header');
		$this->load->view('Usuario');
		$this->load->view('footer');
	}

	function Administracion()
	{
		session_start();
		if (count($_SESSION) > 0) {
			$this->load->view('header');
			$this->load->view('Usuario');
			$this->load->view('footer');
		} else {
			redirect("Welcome/index");
		}
	}


	public function LoginAdministrativo()
	{
		$this->load->view('AdminLogin/LoginAdministrativo');
	}


	function InterfazProfesorado()
	{
		$this->load->view('Header');
		$this->load->view('Profesorado');
		$this->load->view('Footer');
	}

	function InterfazProfesoradoAdm()
	{
		session_start();
		if (count($_SESSION) > 0) {
			$this->load->view('Header');
			$this->load->view('Profesorado');
			$this->load->view('Footer');
		} else {
			redirect('Welcome/index');
		}
	}


	function InterfazDCB()
	{

		$data['Resultado'] = $this->UsuarioSQL->VisualizacionDCB();
		$this->load->view('header');
		$this->load->view('DCB', $data);
		$this->load->view('footer');
	}


	function InterfazDCEA()
	{
		$data['Resultado'] = $this->UsuarioSQL->VisualizacionDCEA();
		$this->load->view('header');
		$this->load->view('DCB', $data);
		$this->load->view('footer');
	}

	function InterfazDIL()
	{
		$data['Resultado'] = $this->UsuarioSQL->VisualizacionDIL();
		$this->load->view('header');
		$this->load->view('DCB', $data);
		$this->load->view('footer');
	}

	function InterfazDMM()
	{
		$data['Resultado'] = $this->UsuarioSQL->VisualizacionMM();
		$this->load->view('header');
		$this->load->view('DCB', $data);
		$this->load->view('footer');
	}


	function InterfazDS()
	{
		$data['Resultado'] = $this->UsuarioSQL->VisualizacionDS();
		$this->load->view('header');
		$this->load->view('DCB', $data);
		$this->load->view('footer');
	}

	function InterfazPOS()
	{
		$data['Resultado'] = $this->UsuarioSQL->VisualizacionPOS();
		$this->load->view('header');
		$this->load->view('DCB', $data);
		$this->load->view('footer');
	}

	function InterfazDDP()
	{
		$data['Resultado'] = $this->UsuarioSQL->VisualizacionDDP();
		$this->load->view('header');
		$this->load->view('TAdmin2', $data);
		$this->load->view('footer');
	}






	function InterfazDCBAdm()
	{
		session_start();
		if (count($_SESSION) > 0) {
			$data['Resultado'] = $this->UsuarioSQL->VisualizacionDCB();
			$this->load->view('header');
			$this->load->view('TAdmin', $data);
			$this->load->view('footer');
		} else {
			redirect('Welcome/index');
		}
	}


	function InterfazDCEAAdm()
	{
		session_start();
		if (count($_SESSION) > 0) {
			$data['Resultado'] = $this->UsuarioSQL->VisualizacionDCEA();
			$this->load->view('header');
			$this->load->view('TAdmin', $data);
			$this->load->view('footer');
		} else {
			redirect('Welcome/index');
		}
	}

	function InterfazDILAdm()
	{
		session_start();
		if (count($_SESSION) > 0) {
			$data['Resultado'] = $this->UsuarioSQL->VisualizacionDIL();
			$this->load->view('header');
			$this->load->view('TAdmin', $data);
			$this->load->view('footer');
		} else {
			redirect('Welcome/index');
		}
	}

	function InterfazDMMAdm()
	{
		session_start();
		if (count($_SESSION) > 0) {
			$data['Resultado'] = $this->UsuarioSQL->VisualizacionMM();
			$this->load->view('header');
			$this->load->view('TAdmin', $data);
			$this->load->view('footer');
		} else {
			redirect('Welcome/index');
		}
	}


	function InterfazDSAdm()
	{
		session_start();
		if (count($_SESSION) > 0) {
			$data['Resultado'] = $this->UsuarioSQL->VisualizacionDS();
			$this->load->view('header');
			$this->load->view('TAdmin', $data);
			$this->load->view('footer');
		} else {
			redirect('Welcome/index');
		}
	}

	function InterfazPOSAdm()
	{
		session_start();
		if (count($_SESSION) > 0) {
			$data['Resultado'] = $this->UsuarioSQL->VisualizacionPOS();
			$this->load->view('header');
			$this->load->view('TAdmin', $data);
			$this->load->view('footer');
		} else {
			redirect('Welcome/index');
		}
	}

	function InterfazDDPAdm()
	{
		session_start();
		if (count($_SESSION) > 0) {
			$data['Resultado'] = $this->UsuarioSQL->VisualizacionDDP();
			$this->load->view('header');
			$this->load->view('TAdmin2', $data);
			$this->load->view('footer');
		} else {
			redirect('Welcome/index');
		}
	}

	function RFormularioTec()
	{
		session_start();
		if (count($_SESSION) > 0) {
			$data['Datos2'] = $this->UsuarioSQL->VisualizacionEdificio();
			$data['Datos'] = $this->UsuarioSQL->VisualizacionTurno();
			$data['Datos3'] = $this->UsuarioSQL->VisualizacionDepartamental();
			$this->load->view('header');
			$this->load->view('RFormulario', $data);
			$this->load->view('footer');
		} else {
			redirect('Welcome/index');
		}
	}

	function ActualizarDatos()
	{
		session_start();
		if (count($_SESSION) > 0) {
			$ID = $this->input->get('id');
			$datos = $this->CRUDESQL->GetDatos($ID);
			$Edificio = $this->UsuarioSQL->VisualizacionEdificio();
			$Departamento = $this->UsuarioSQL->VisualizacionDepartamental();
			$Turno = $this->UsuarioSQL->VisualizacionTurno();
			$data = array(
				'Profesor' => $datos,
				'Edificio' => $Edificio,
				'Departamento' => $Departamento,
				'Turno' => $Turno,
			);
			$this->load->view('header');
			$this->load->view('EditarProfesorado', $data);
			$this->load->view('footer');
		}
	}

	function DFormularioTec()
	{
		session_start();
		if (count($_SESSION) > 0) {
			$data['Datos2'] = $this->UsuarioSQL->VisualizacionEdificio();
			$this->load->view('header');
			$this->load->view('DFormulario', $data);
			$this->load->view('footer');
		} else {
			redirect('Welcome/index');
		}
	}

	function ActualizarDatosDDD()
	{
		session_start();
		if (count($_SESSION) > 0) {
			$ID = $this->input->get('id');
			$datos = $this->CRUDESQL->GetDatosDDD($ID);
			$Edificio = $this->UsuarioSQL->VisualizacionEdificio();
			$data = array(
				'Directivo' => $datos,
				'Edificio' => $Edificio,
			);
			$this->load->view('header');
			$this->load->view('EditarDDD', $data);
			$this->load->view('footer');
		}
	}

	function DashboardP(){
		$this->load->view('DashboardProfesorado');
	}
}
