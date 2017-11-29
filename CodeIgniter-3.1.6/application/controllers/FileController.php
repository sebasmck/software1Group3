<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class FileController extends CI_Controller {

	function __construct(){
  		parent::__construct();
  		$this->load->helper('form');
  		$this->load->model('FileService_model');
  		$this->load->library('upload');
             //   $this->load->library('/controllers/LoginController');
  	}

  	function index(){

  		$data['entidades'] = $this->FileService_model->obtenerEntidades();
  		$data['error'] = '';
                
                $usern['username'] = $this->session->userdata('username');
  		$this->load->view('panelPrincipal/header');
  		$this->load->view('panelPrincipal/MainMenu', $usern);
  		$this->load->view('formularioArchivo/formulario',$data);
  		$this->load->view('panelPrincipal/footer');
  	}

  	  public function obtenerDatos(){
  				//	$ruta = base_url().'uploads/';
  		 		//	$config['upload_path'] =  str_replace('/', '\\', $ruta);
  	  			$idEntidad = $this->input->post('identidad');

  				$config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'csv';

                $this->load->library('upload');
              	$this->upload->initialize($config,true);


                if ( ! $this->upload->do_upload('userfile'))
                {
                    $this->mostrarResultadoErroneo();
                   
                }
                else
                {
                    $this->mostrarResultadoExitoso($idEntidad);  
                	
                }
    
		}

		private function mostrarResultadoErroneo()
		{
			  $errorConFormato = '<div class="callout callout-danger">
			  					<h4>Danger</h2>
			  					<p>
			  					'.$this->upload->display_errors().'
			  					</p>
			  					</div> ';
             $usern['username'] = $this->session->userdata('username');
                          $data = array(  'error' => $errorConFormato,
                    		  'entidades' => $this->FileService_model->obtenerEntidades());
                        $this->load->view('panelPrincipal/header');
  						$this->load->view('panelPrincipal/MainMenu', $usern);
                        $this->load->view('formularioArchivo/formulario', $data);
                        $this->load->view('panelPrincipal/footer');
		}


		private function mostrarResultadoExitoso($extra)
		{	
			   $info = $this->upload->data();
               $data = array('nombreArchivo' => $info['file_name'],
           					 'id_entidad' => $extra	);
      

               $this->analizarEstructura($data);       

		}

		private function analizarEstructura($data)
		{
			date_default_timezone_set('America/Bogota');			
			$fecha = date("Y-m-d\TH:i:sO");
			$path = base_url().'/uploads/'.$data['nombreArchivo'];
			$lineas = file($path);

			$i = 0;
			$error = 0;
			$upl =0;
			
			$j = 0; //contador actualizados
			$k = 0; //contador nuevos registros
			$valorTotalRecaudo = 0;
			

			foreach ($lineas as $filas => $valor) {
				$tmperror=0;
				if($i>=0){
					$f = explode(";", $valor);
					$cedula = trim($f[0]);
					$valorConsignado = trim($f[1]);
					$numeroReferencia = trim($f[2]);
					$codigoDeBarras = trim($f[3]);
					$fechaHoraRecaudo = trim($f[4]);					
					
					$data_links[$k] = array('Cedula' => $cedula,
										'ValorConsignado' => $valorConsignado,
										'NumeroDeReferencia' => $numeroReferencia,
										'CodigoDeBarras' => $codigoDeBarras,
										'FechaHoraRecaudo' => $fechaHoraRecaudo );
					

					$valorTotalRecaudo += $valorConsignado;
					$k++;
				}
				$i++;
			}
			$i--;

			
			$data_encabezado = 	array('id_entidadPago' => $data['id_entidad'],
								'Nombre_Archivo' => $data['nombreArchivo'],
								'NumeroDeFilas_Archivo' => $k,
								'TotalRecaudado_Archivo' => $valorTotalRecaudo,
								'FechaHora_Archivo' => $fecha);

			$idEncabezado = $this->FileService_model->subirEncabezado($data_encabezado);


			foreach ($data_links as $var => $value) {
				$value['Id_Encabezado_Archivo'] = $idEncabezado;
				$this->FileService_model->subirArchivos($value);
			}

			$arrayPresentacion =  array('nombre del archivo' => $data_encabezado['Nombre_Archivo'],
										'numero de filas' => $data_encabezado['NumeroDeFilas_Archivo'],
										'total recaudado' => $data_encabezado['TotalRecaudado_Archivo'],
										'fecha de carga' => $data_encabezado['FechaHora_Archivo']);
									
			$todo['data_encabezado'] = $arrayPresentacion;

                        $usern['username'] = $this->session->userdata('username');
			$this->load->view('panelPrincipal/header');
  			$this->load->view('panelPrincipal/MainMenu', $usern);
            $this->load->view('formularioArchivo/upload_success',$todo);
            $this->load->view('panelPrincipal/footer');


		}


		private function enviarEmail($todo){ //LE DEBERIA ENTRAR TAMBIEN LA DIRECCION DE CORREO DESTINO?
		    
		    
		/*	$this->load->library('email');
			$this->email->from('andresm28k@gmail.com', 'Andres muñoz');
			$this->email->to('andresm28k@gmail.com');
			$this->email->cc('andresm28k@gmail.com');
			$this->email->bcc('andresm28k@gmail.com');

			$this->email->subject('Email Test');
			$message = '<h1>Registro de subida de archivo<h1>';
			$n = 1;
			$message +='<table>
						<tbody>
						<tr>
                          <th style="width: 10px">#</th>
                          <th>Detalle</th>
                          <th>Valor</th>
                        </tr>';
                              

                          foreach ($data_encabezado as $key => $value) {
                              $message += '<tr><td>'.$n.'</td><td>'.$key.'</td><td>'.$value.'</td><tr>';
                                $n ++;
                          }
            $message += '</tbody>
                          </table> ';

			$this->email->message($message);

			$this->email->send();*/
			
			
		//*********** 22-11-17 **********************************
		
		$config = Array(
        'protocol' => 'SMTP', //siempre mayusculas
        'smtp_host' => 'smtp.gmail.com',
        'smtp_port' => 587,
        'smtp_crypto'=> 'TLS', //siempre mayusculas
        'smtp_user' => 'ingsoftwaregrupo2@gmail.com', 
        'smtp_pass' => 'grupo22017', 
        'mailtype' => 'html',
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
        );
 
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('ingsoftwaregrupo2@gmail.com'); // remitente
        $this->email->to('ingsoftwaregrupo2@gmail.com'); // destino
        $this->email->subject('CORREO ENVIADO MEDIANTE PHP-CODEIGNITER.');
        
        
        $this->email->message('ESTE ES UN MENSAJE DE PRUEBA'. $todo);
 
         if($this->email->send()){
             echo 'CORREO ENVIADO';
        }
        else{
 	        echo ("NO SE PUDO ENVIAR.");
 	        show_error($this->email->print_debugger());
            }

		}


	/*public function cargarArchivo() {

		if ($_FILES["userfile"]["error"] > 0)
 		{
  			echo "Error: " . $_FILES["userfile"]["error"] . "<br>";
 		}
		else
  		{
  				echo "Upload: " . $_FILES["userfile"]["name"] . "<br>";
  				echo "Type: " . $_FILES["userfile"]["type"] . "<br>";
  				echo "Size: " . ($_FILES["userfile"]["size"] / 1024) . " kB<br>";
  				echo "Stored in: " . $_FILES["userfile"]["tmp_name"];
  		}
	}
	*/
  
 

}
