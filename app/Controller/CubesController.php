<?php
/**
 * Static content controller.
 *
 * This file will render views from views/cubes/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses ( 'AppController', 'Controller' );

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class CubesController extends AppController {
	
	/**
	 * Este Controlador no usa capa de modelo
	 */
	public $helpers = array (
			'Session' 
	);
	
	public $sesiondata=array();
	
	public $sumatot=0;
	/**
	 * Displays a view
	 *
	 * @return void
	 * @throws NotFoundException When the view file could not be found
	 *         or MissingViewException in debug mode.
	 */
	public function mainpage() {
		
		$this->set('sumatot', $this->sumatot);
		$this->layout = 'starter';
		$this->sesiondata = $this->Session->read ( 'Rapcube');
		#echo "--t".;
		$this->startparamters ();
		#print_r ( $_SESSION["suma"] );
		// <form id="RecipeEditForm" method="post" action="/recipes/edit/5">
		// <input type="hidden" name="_method" value="PUT" />
		if ($this->request->is ( 'post' )) {
			// echo "aaaaaaa<pre>"; print_r($this->Session->read('Rapcube')); echo "</pre>";
			// SET DATA
			#echo "<pre>"; print_r($_POST); echo "</pre>";
			if (($_POST ["data"] ["Rapcube"] ["type"]==1)) {
				$parameterproc ["x"] = $_POST ["data"] ["Rapcube"] ["x"];
				$parameterproc ["y"] = $_POST ["data"] ["Rapcube"] ["y"];
				$parameterproc ["z"] = $_POST ["data"] ["Rapcube"] ["z"];
				$parameterproc ["w"] = $_POST ["data"] ["Rapcube"] ["w"];
				
				// print_r($parameterproc);
				$this->setparameters ( $parameterproc );
			}
			;
			if ($_POST ["data"] ["Rapcube"] ["type"]==3) {
			$this->Session->destroy();
			};
			// QUERY
			if (($_POST ["data"] ["Rapcube"] ["type"]==2)) {
				
				$is_valid_q = 1;
				$faltantes="";
				 
				if ($_POST ["data"] ["Rapcubestartq"] ["x"] =="") {
					$is_valid_q = 0; 
					$faltantes.=" X inicio";
				}
				
				if ( $_POST ["data"] ["Rapcubestartq"] ["y"]=="") {
					$is_valid_q = 0;
					$faltantes.=", Y inicio";
				}
				
				if ( $_POST ["data"] ["Rapcubestartq"] ["z"] =="") {
					$is_valid_q = 0;
					$faltantes.=", Z inicio";
				}
				
				if ( $_POST ["data"] ["Rapcubendq"] ["x"] =="") {
					$is_valid_q = 0;
					$faltantes.=", X fin";
				}
				
				if ( $_POST ["data"] ["Rapcubendq"] ["y"]=="") {
					$is_valid_q = 0;
					$faltantes.=", Y fin";
				}
				
				if ($_POST ["data"] ["Rapcubendq"] ["z"]=="") {
					$is_valid_q = 0;
					$faltantes.=", Z fin";
				}
				#echo $is_valid_q."jjj";
				if ($is_valid_q == 0) {
					
					$this->Session->setFlash ( '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Por favor diligencie: '.$faltantes );
				}
				
				if ($is_valid_q == 1) {
					//$this->Session->write ( 'suma', 0 );
					$this->sesiondata = $this->Session->read ( 'Rapcube');
					
					$cube ["start"] ["x"] = $_POST ["data"] ["Rapcubestartq"] ["x"];
					$cube ["start"] ["y"] = $_POST ["data"] ["Rapcubestartq"] ["y"];
					;
					$cube ["start"] ["z"] = $_POST ["data"] ["Rapcubestartq"] ["z"];
					;
					$cube ["end"] ["x"] = $_POST ["data"] ["Rapcubendq"] ["x"];
					$cube ["end"] ["y"] = $_POST ["data"] ["Rapcubendq"] ["y"];
					$cube ["end"] ["z"] = $_POST ["data"] ["Rapcubendq"] ["z"];
					
					$totalsuma = $this->startquery ( $cube,$this->sesiondata );
					
					$this->Session->write ( 'suma',$totalsuma);
					$this->sumatot=$totalsuma;
					#echo $this->sumatot;
					$this->set('sumatot', $this->sumatot);
					
					 
				}
				
				$this->sesiondata = $this->Session->read ( 'Rapcube');
			}
			
			 
		}
		;
	}
	public function setparameters($parameters) {
		$is_valid = 1;
		$faltantes="";
		if ($parameters ["x"]=="") {
			$is_valid = 0;
			$faltantes.=" Valor X";
		}
		;
		if ( $parameters ["y"]=="") {
			$is_valid = 0;
			$faltantes.=", Valor Y";
		}
		;
		if ($parameters ["z"]=="") {
			$is_valid = 0;
			$faltantes.=", Valor Z";
		}
		;
		if ($parameters ["w"]=="") {
			$is_valid = 0;
			$faltantes.=" Valor W";
		}
		;
		
		if ($is_valid == 1) {
			
			$this->Session->write ( 'Rapcube.' . $parameters ["x"] . "." . $parameters ["y"] . "." . $parameters ["z"], $parameters ["w"] );
			$this->sesiondata = $this->Session->read ( 'Rapcube');
		}
		;
		
		if ($is_valid == 0) {
			 
			$this->Session->setFlash ( '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Por favor diligencie: '.$faltantes );
		}
	}
	public function startquery($cube,$sesdata) {
		$this->sesiondata = $sesdata;
		$suma=0;
		$cubeses = $sesdata;
	 
		
		foreach($cubeses as $xkey=>$xvalue){
			
			foreach($xvalue as $ykey=>$yvalue){
					
				foreach($yvalue as $zkey=>$zvalue){
						
					$is_approved=1;
					if(($cube ["start"] ["x"]>$xkey) or ($cube ["end"] ["x"]<$xkey)){
						$is_approved=0;
					};
					if(($cube ["start"] ["y"]>$xkey) or ($cube ["end"] ["y"]<$ykey)){
						$is_approved=0;
					};
					if(($cube ["start"] ["z"]>$xkey) or ($cube ["end"] ["z"]<$zkey)){
						$is_approved=0;
					};
					
					if($is_approved==1){$suma = $suma+$zvalue;  };	
						
						
						
				}
					
			}
			
		}
		 
		
return $suma;
		
		 
	}
	public function startparamters() {
		
		
		$currentses = $this->sesiondata;
		
		$currentses =$this->Session->read('Rapcube.1.1.1');
		#echo $currentses;
		if(!isset($currentses)) {
		 
		#	echo "new";
		$cube ["start"] ["x"] = 1;
		$cube ["start"] ["y"] = 1;
		$cube ["start"] ["z"] = 1;
		$cube ["end"] ["x"] = 4;
		$cube ["end"] ["y"] = 4;
		$cube ["end"] ["z"] = 4;
		
		for($cube ["start"] ["x"] = 1; $cube ["start"] ["x"] < $cube ["end"] ["x"]; $cube ["start"] ["x"] ++) {
			for($cube ["start"] ["y"] = 1; $cube ["start"] ["y"] < $cube ["end"] ["y"]; $cube ["start"] ["y"] ++) {
				
				for($cube ["start"] ["z"] = 1; $cube ["start"] ["z"] < $cube ["end"] ["z"]; $cube ["start"] ["z"] ++) {
					
					$this->Session->write ( 'Rapcube.' . $cube ["start"] ["x"] . "." . $cube ["start"] ["y"] . "." . $cube ["start"] ["z"], 0 );
				}
			}
		}
		
		$this->sesiondata = $this->Session->read ( 'Rapcube');
		}
	}
}
