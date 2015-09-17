
<div class="page-header">
	<h1>Cube Summation Test</h1>
</div>
<p class="lead">Aplicaci&oacute;n que resuelve Coding Chalennge
	Grability - Hackerank</p>
	<p class="lead">Por favor ingresar coordenadas entre 1 y 4</p>
<p>
<div class="row">
	<div class="col-md-6">

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Formulario Ingreso de datos</h3>
			</div>
			<div class="panel-body">
				<form id="formad" method="post">
					<div class="form-group">
						 
						
							<?php
							$options = array (
									'0' => 'Seleccione el tipo de proceso',
									'1' => 'Definir / Actualizar',
									'2' => 'Realizar Consulta',
									'3' => 'Borrar Memoria' 
							);
							echo $this->Form->select ( 'Rapcube.type', $options, array (
									"class" => "form-control",
									"label" => "Tipo de Proceso",
									"default" => "0" 
							) );
							?>

					</div>



					<!-- SOBRE SET Y UPDATE -->

					<div id="updateset" class="row hide">
						<div class="col-md-3">
							<div class="form-group">
						 
						<?php
						echo $this->Form->input ( 'Rapcube.x', array (
								"class" => "form-control",
								"label" => "Valor X" 
						) );
						?>
								 		 
					</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
											 
						 <?php
							echo $this->Form->input ( 'Rapcube.y', array (
									"class" => "form-control",
									"label" => "Valor Y" 
							) );
							?>
								 		 
					</div>
						</div>
						<div class="col-md-3">
							<div class="form-group ">
						 
						 <?php
							echo $this->Form->input ( 'Rapcube.z', array (
									"class" => "form-control",
									"label" => "Valor Z" 
							) );
							?>
								 		 
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group ">
						 
						 <?php
							echo $this->Form->input ( 'Rapcube.w', array (
									"class" => "form-control",
									"label" => "Valor W" 
							) );
							?>
								 		 
							</div>
						</div>



					</div>


					<!-- 					QUERY -->
					<div id="queryfield" class="hide">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
						 
						<?php
						echo $this->Form->input ( 'Rapcubestartq.x', array (
								"class" => "form-control",
								"label" => "Valor X Inicio" 
						) );
						?>
								 		 
					</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
											 
						 <?php
							echo $this->Form->input ( 'Rapcubestartq.y', array (
									"class" => "form-control",
									"label" => "Valor Y Inicio" 
							) );
							?>
								 		 
					</div>
							</div>
							<div class="col-md-4">
								<div class="form-group ">
						 
						 <?php
							echo $this->Form->input ( 'Rapcubestartq.z', array (
									"class" => "form-control",
									"label" => "Valor Z Inicio" 
							) );
							?>
								 		 
							</div>
							</div>

						</div>


						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
						 
						<?php
						echo $this->Form->input ( 'Rapcubendq.x', array (
								"class" => "form-control",
								"label" => "Valor X Fin" 
						) );
						?>
								 		 
					</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
											 
						 <?php
							echo $this->Form->input ( 'Rapcubendq.y', array (
									"class" => "form-control",
									"label" => "Valor Y Fin" 
							) );
							?>
								 		 
					</div>
							</div>
							<div class="col-md-4">
								<div class="form-group ">
						 
						 <?php
							echo $this->Form->input ( 'Rapcubendq.z', array (
									"class" => "form-control",
									"label" => "Valor Z Fin" 
							) );
							?>
								 		 
							</div>
							</div>

						</div>

					</div>
					
					<input id="btsend" type="submit" value="actualizar" class="btn btn-default" />  
					<input id="btsendq" type="submit" value="calcular" class="btn btn-default" />  
				</form>

			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Resultados</h3>
			</div>
			<div class="panel-body">
<?php 
 if($sumatot!=0){echo '<span class="label label-success" style="font-size:15px"> El resultado del Query es: '.$sumatot.'  </span> ';};

 
 echo "<br>MATRIZ - MEMORIA<br><pre>"; print_r($this->Session->read("Rapcube")); echo "</pre>";?>
</div>
		</div>
	</div>
</div>
<hr>
<blockquote class="blockquote-reverse">
	<p>Rodrigo Avila P&eacute;rez - rodrigoavibwz@gmail.com</p>
	<footer>Web Designer / Frontend Developer / Backend Developer</footer>
</blockquote>