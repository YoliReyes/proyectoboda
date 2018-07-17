<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Imanol & Yoli</title>
		<meta charset="utf-8">
		<meta name="format-detection" content="telephone=no" />
		
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/form.css">
		<link rel="stylesheet" href="css/misestilos.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">


		<script src="js/jquery.js"></script>
		<script src="js/jquery-migrate-1.2.1.js"></script>
		<script src="js/script.js"></script>
		
		
	</head>

	<body class="bodyform">
		<script>
			//funcion para activar/desactivar inputs TIPO OPCION	
			function activardesactivar( usuario ){

				if( $( '#' + usuario + 'asiste' ).prop('checked')){

					$('.deshabilitar' + usuario ).removeAttr('disabled');//ACTIVAR
					$('.textarea' + usuario ).removeClass( 'deshabilitado' );//ACTIVAR
					
					$( '#cajacomidas' + usuario ).attr( "title", "Debes seleccionar al menos una opción" );				
					$( '#' + usuario + 'comida' ).removeAttr('disabled');//ACTIVAR
					$( '#' + usuario + 'postre' ).removeAttr('disabled');//ACTIVAR
					$( '#' + usuario + 'recena' ).removeAttr('disabled');//ACTIVAR
	
				}else{

					$('.deshabilitar' + usuario ).attr('disabled',''); //DESACTIVAR
					$('.textarea' + usuario ).addClass( 'deshabilitado' );//DESACTIVAR
					$( '#cajacomidas' + usuario ).removeAttr( "title" );

					$( '#' + usuario + 'comida' ).removeAttr('checked');
					$( '#' + usuario + 'postre' ).removeAttr('checked');
					$( '#' + usuario + 'recena' ).removeAttr('checked');
		
				}
			}

			function comida( usuario ){

				if( $( '#' + usuario + 'comida' ).prop('checked')){
					
					$( '#' + usuario + 'postre' ).attr('disabled',''); //DESACTIVAR
					$( '#' + usuario + 'postre' ).attr('checked','checked');
						
				}else{
					$( '#' + usuario + 'postre' ).removeAttr('disabled');//ACTIVAR	
					$( '#' + usuario + 'postre' ).removeAttr('checked');
						
				}
			}

			function postre( usuario ){

				if( $( '#' + usuario + 'postre' ).prop('checked')){
					
					$( '#' + usuario + 'comida' ).attr('disabled',''); //DESACTIVAR

						
				}else{
					$( '#' + usuario + 'comida' ).removeAttr('disabled');//ACTIVAR									
				}
			}
		</script>

		<div>	
			<div class="texcenter">
					
				@if(isset($mensaje))
					<div class="imgpaddingtop">
						<img class="imgdestacados" src="images/error.png" alt="ohh-ohh!Ha ocurrido un error, inténtalo de nuevo o ponte en contacto con nosotros.">					
					</div>	
					

				@endif
				
				@if(isset($insercioncorrecta))
					<div class="imgpaddingtop">
						<img  class="imgdestacados" src="images/gracias-respuesta.png" alt="Gracias por confirmarnos tu asistencia">					
					</div>
						
					<div class="cajaform2">
						<button type="submit"  onclick = "location='{{ url('/confirmacion') }}'" class="btn sinborde">Volver a Inicio</button>
					</div>			
				@endif

				
							

				@if(isset($invitados))

				<div class="paddtop">
					<img src="images/confirmacion-formulario.png" alt="formulario de confirmación">					
				</div>

					<div class="cajaform2">
								
						<form id="form" action="{{ url('/insercion') }}" method="post">
							{{ csrf_field() }}

							<p class="titular">¿ quién confirma ?</p>
							<input name="codigo" value="{{$invitados[0]->codigo_confirmacion}}" type="hidden">
							<input name="id" value="{{$invitados[0]->id_usuario}}" type="hidden">
							<input name="confirmado" value="{{$invitados[0]->confirmado}}" type="hidden">
							
							
							@if(isset($invitados[1]->id_usuario))
								@if( $invitados[1]->id_usuario != ((int)$invitados[0]->id_usuario + 1))
									<input name="acompanante" value="{{$invitados[1]->id_usuario}}" type="hidden">
								@endif
							@endif

							<div>										
								<label class="message">
									<input id="nombreconfirm" name="nombreconfirm" type="text" 
										placeholder="Nombre:" required pattern="^[A-Za-zñÑ\sáéíóú]+$" 
										oninvalid="setCustomValidity('Introduce un nombre válido, sin caracteres numéricos')" 
										oninput="setCustomValidity('')"
										class="margeninput"/>
								</label>
							</div>
							
							<div>
								<label class="message">
									<input id="emailconfirm" name="emailconfirm" type="text" 
										placeholder="E-mail:" required pattern="^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$" 
										oninvalid="setCustomValidity('Introduce un email válido')" 
										oninput="setCustomValidity('')"
										class="margeninput"/>
								</label>
							</div>
												
							<div>
								<label class="message">
									<input id="tlfconfirm" name="tlfconfirm"  type="text" 	
										placeholder="Telefono:" required pattern="^[9|6|7|8][0-9]{8}$" 	
										oninvalid="setCustomValidity('Introduce un número de teléfono válido, sin espacios')" 
										oninput="setCustomValidity('')" 
										class="margeninput"/>
								</label> 
							</div>
							<div class="clear"></div>
							<div class="titular">Asistentes</div>	

							@foreach($invitados->all() as $invitado)

								<input name="id{{$invitado->id_usuario}}" value="{{$invitado->id_usuario}}" type="hidden">

								<div class="cajainvitado">
									<div class="cajatituloinvitado">
										<span style="display:inline-block;width:40%">
											<div class="nombre">{{$invitado->nombre}}</div>
											<input name="{{$invitado->id_usuario}}nombre" value="{{$invitado->nombre}}" type="hidden">

										</span>

										<span class="asisten">
											<input id="{{$invitado->id_usuario}}asiste" name="{{$invitado->id_usuario}}asiste" class="inputcheck" type="radio" value="1" onchange="activardesactivar('{{$invitado->id_usuario}}')"> <div class="asiste">¡SÍ QUE VOY!</div>
											<div class="clear"></div>

											<input id="{{$invitado->id_usuario}}noasiste" name="{{$invitado->id_usuario}}asiste" class="inputcheck" type="radio" value="0" onchange="activardesactivar('{{$invitado->id_usuario}}')"> <div class="asiste">¡NO PODRÉ IR!</div>

										</span>
										
									</div>
									<div class="clear"></div>

									@if($invitado->adulto == 0)
										<div class="adulto">BEBÉ SIN MENÚ</div>
									@endif
									@if($invitado->adulto == 1)
										<div class="adulto">MENÚ INFANTIL</div>
									@endif
									@if($invitado->adulto == 2)
										<div class="adulto">MENÚ ADULTO</div>
									@endif

									@if($invitado->adulto != 0)
										<div id="cajacomidas{{$invitado->id_usuario}}" class="cajacomidas">

											<span class="ticcomida">
												<input id="{{$invitado->id_usuario}}comida" name="{{$invitado->id_usuario}}comida" class="inputcheck deshabilitar{{$invitado->id_usuario}}" type="checkbox" value="1" disabled onchange="comida('{{$invitado->id_usuario}}')"> <div class="labelinvitado">Comida</div>
											</span>

											<span class="ticcomida">
												<input id="{{$invitado->id_usuario}}postre" name="{{$invitado->id_usuario}}postre" class="inputcheck deshabilitar{{$invitado->id_usuario}}" type="checkbox" value="1" disabled onchange="postre('{{$invitado->id_usuario}}')"> <div class="labelinvitado">Postre</div>
											</span>

											<span class="ticcomida">
												<input id="{{$invitado->id_usuario}}recena" name="{{$invitado->id_usuario}}recena" class="inputcheck deshabilitar{{$invitado->id_usuario}}" type="checkbox"  value="1" disabled> <div class="labelinvitado">Recena</div>
											</span>

											<div class="clear"></div>

											<textarea id="{{$invitado->id_usuario}}especial" name="{{$invitado->id_usuario}}especial" class="deshabilitado textarea deshabilitar{{$invitado->id_usuario}} textarea{{$invitado->id_usuario}}" id="menuespecial" placeholder="¿ Menú especial ? :" min="20" max="250" rows="4" oninvalid="setCustomValidity('Introduce un email válido')" 
										oninput="setCustomValidity('')" disabled></textarea>
											
											<div class="clear"></div>
											
										</div>
									@endif
								</div>

								@if($invitado->confirmado == 1)
									<!--recuprrar datos de invitacion confirmada-->
									<script>
										$( '#nombreconfirm' ).attr("value","{{$invitado->nombreConfirm}}");
										$( '#emailconfirm' ).attr("value","{{$invitado->emailConfirm}}");
										$( '#tlfconfirm').attr("value","{{$invitado->tlfConfirm}}");
										
									</script>
									@if($invitado->asistira == 1)
										
										<script>
											$('.textarea{{$invitado->id_usuario}}').removeClass( 'deshabilitado' );
											$( '#{{$invitado->id_usuario}}asiste' ).attr('checked','checked');
										
											
											if('{{$invitado->adulto}}' != 0){

												if('{{$invitado->comida}}' == 1){
													$( '#{{$invitado->id_usuario}}comida' ).attr('checked','checked');
													$( '#{{$invitado->id_usuario}}postre' ).attr('checked','checked');
													$( '#{{$invitado->id_usuario}}comida' ).removeAttr('disabled');//habilitado
													$( '#{{$invitado->id_usuario}}postre' ).attr('disabled',''); //deshabilitadp
												}else{

													if('{{$invitado->cafe}}' == 1){
														$( '#{{$invitado->id_usuario}}postre' ).attr('checked','checked');
														$( '#{{$invitado->id_usuario}}postre' ).removeAttr('disabled');//habilitado
														$( '#{{$invitado->id_usuario}}comida' ).attr('disabled','');
													}
												}										

												if('{{$invitado->recena}}' == 1){
													$( '#{{$invitado->id_usuario}}recena' ).attr('checked','checked');
													$( '#{{$invitado->id_usuario}}recena' ).removeAttr('disabled');
												}else{
													$( '#{{$invitado->id_usuario}}recena' ).removeAttr('disabled');

												}

												$( '#{{$invitado->id_usuario}}especial' ).attr("value","{{$invitado->menuespecial}}")		
												$( '#{{$invitado->id_usuario}}especial' ).removeAttr('disabled');
											}
										</script>
									@else
										<script>

											$( '#{{$invitado->id_usuario}}noasiste' ).attr('checked','checked');

										</script>
									@endif
								@endif
							@endforeach

						<!-- -->
							@if(count($invitados) == 1)

										
										
								<div class="cajainvitado">
									<div class="cajatituloinvitado">
										<div>
										<span style="display:inline-block;width:40%">
											<div class="nombre">Acompañante</div>
										</span>

										<span class="asisten">

										<input id="acompananteasiste" name="acompananteasiste" class="inputcheck" type="checkbox" value="1" onchange="activardesactivar('acompanante')"> <div class="asiste">¡SÍ!</div>

											<div class="clear"></div>

										</span>

											<label class="message">
												<input name="acompanantenombre" type="text" 
													placeholder="Nombre acompañante:" required pattern="^[A-Za-z\sáéíóú]+$" 
													oninvalid="setCustomValidity('Introduce un nombre válido, sin caracteres numéricos')" 
													oninput="setCustomValidity('')" disabled class="deshabilitado deshabilitaracompanante textareaacompanante"/>
											</label>
										</div>
										
										<div class="clear"></div>
									</div>

									<div id="cajacomidasacompanante" class="cajacomidas">


										<span class="ticcomida">
											<input id="acompanantecomida" name="acompanantecomida" class="inputcheck deshabilitaracompanante" type="checkbox" value="1" disabled onchange="comida('acompanante')"> <div class="labelinvitado">Comida</div>
										</span>

										<span class="ticcomida">
											<input id="acompanantepostre" name="acompanantepostre" class="inputcheck deshabilitaracompanante" type="checkbox" value="1" disabled onchange="postre('acompanante')"> <div class="labelinvitado">Postre</div>
										</span>

										<span class="ticcomida">
											<input id="acompananterecena" name="acompananterecena" class="inputcheck deshabilitaracompanante" type="checkbox" value="1" disabled> <div class="labelinvitado">Recena</div>
										</span>

										<div class="clear"></div>

										<textarea name="acompananteespecial" class="deshabilitado textarea deshabilitaracompanante textareaacompanante" id="menuespecial" placeholder="¿ Menú especial ? :" min="20" max="250" rows="4" oninvalid="setCustomValidity('Introduce un email válido')" 
										oninput="setCustomValidity('')" disabled></textarea>

										<div class="clear"></div>

									</div>
								</div>

							@endif
						
								<div>
									<button type="submit" class="btn sinborde">Confirmar</button>
								</div>
							</div>
						</form>
					</div>
				@endif
			</div>
		</div>
	</body>
</html>
