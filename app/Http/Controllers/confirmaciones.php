<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use App\usuarios as Usuario;
use App\Mail\emailconfirmacion;
use App\Mail\emailrespuesta;
use App\Mail\emailmodificado;


use Illuminate\Support\Facades\Mail;


class confirmaciones extends Controller
{
    public function codigo(Request $request){
        $rules=array(

            'codigo'=>['required' , 'size:6' , 'regex:/^\d+$/'],

        );

        $respuesta = Validator::make($request->all(),$rules);
        $mensaje="Oh-ooh! Ha ocurrido un error. Inténtalo de nuevo o ponte en contacto con nosotros.";

        if($respuesta->fails()){

            return view ('formconfirm', compact('mensaje'));

        }else{

            $codigo=$request->codigo;

            $invitados = Usuario::where('codigo_confirmacion',$codigo)->get();
            
            if(count($invitados) == 0){
                return view ('formconfirm', compact('mensaje'));
            }else{
                return view ('formconfirm', compact('invitados'));
            }

        }
    }


    public function insertar(Request $request){
        //recojo los datos generales
        $codigo = $request->codigo;
        $nombreConfirm = $request->nombreconfirm;    
        $tlfConfirm = $request->tlfconfirm;    
        $emailConfirm = $request->emailconfirm;  
        //consulto en la base los usuarios a modificar
        $invitados = Usuario::where('codigo_confirmacion',$codigo)->get();

        $emailviejo = $invitados[0]->emailConfirm;
        
        foreach($invitados->all() as $invitado)

   		{   
            $id = $invitado->id_usuario;

            $asiste = $this->asignavalor('asiste',$id,$request);            
            $comida = $this->asignavalor('comida',$id,$request); 
            $cafe = 0;

            if($comida == 1){
                $cafe = 1;
            }else{
                $cafe = $this->asignavalor('postre',$id,$request);    
            }

            $recena = $this->asignavalor('recena',$id,$request);  
            $especial = "Menú Normal" ;
            
            if($request->input($id.'especial')!= null){
                $especial = $request->input($id.'especial'); 
            }else{
                if($asiste==0){
                    $especial = "Sin Menú";
                }
            }

            //update
            $invitados =  Usuario::where('id_usuario', $id)
                                ->update([  'confirmado' => 1,
                                            'asistira' => $asiste, 
                                            'comida' => $comida,
                                            'cafe' => $cafe,
                                            'recena' => $recena,
                                            'menuespecial' => $especial,
                                            'nombreConfirm' => $nombreConfirm,
                                            'tlfConfirm' => $tlfConfirm,
                                            'emailConfirm' => $emailConfirm,
                                        ]);
        }

        if($request->input('acompananteasiste')){


            $asisteB = $this->asignavalor('asiste','acompanante',$request);
            $nombreB = $request->input('acompanantenombre');      
            $comidaB = $this->asignavalor('comida','acompanante',$request); 
            $cafeB = 0;

            if($comidaB == 1){
                $cafeB = 1;
            }else{
                $cafeB = $this->asignavalor('postre','acompanante',$request);    
            }

            $recenaB = $this->asignavalor('recena','acompanante',$request);    
            $especialB = "menú normal" ;
            
            if($request->input('acompananteespecial')!= null){
                $especialB = $request->input('acompananteespecial'); 
            }else{
                if($asisteB == 0){
                    $especialB = "Sin Menú";
                }
            }


            $acompanante = new Usuario;

            $acompanante->nombre = $nombreB;
            $acompanante->codigo_confirmacion = $codigo;
            $acompanante->adulto = 2;
            $acompanante->confirmado = 1;
            $acompanante->asistira = $asisteB;
            $acompanante->comida = $comidaB;
            $acompanante->cafe = $cafeB;
            $acompanante->recena = $recenaB;
            $acompanante->menuespecial = $especialB;
            $acompanante->nombreConfirm = $nombreConfirm;
            $acompanante->tlfConfirm = $tlfConfirm;
            $acompanante->emailConfirm = $emailConfirm;

            $acompanante->save();

        }
            //si es la 1 vez que se confirma
        if($request->confirmado == 0){
            //email para usuario, gracias
            $emailrespuesta = new emailrespuesta();
            Mail::to($emailConfirm)->send($emailrespuesta);

        }else{
            //email para usuario, reconfirmacion

            $emailrespuesta = new emailrespuesta();
            Mail::to($emailviejo)->send($emailrespuesta);

            $request->request->add(['reconfirmado'=>'1']);
            dd($request->all());

            $emailrespuesta = new emailrespuesta();
            Mail::to($emailConfirm)->send($emailrespuesta);       

        }
        

        //email para master
        $emailmaster = new emailconfirmacion();
        Mail::to("yolireyesgarcia@gmail.com")->send($emailmaster);


        $insercioncorrecta= "inserción Correcta";
        return view ('formconfirm', compact('insercioncorrecta'));
        
    }


    public function asignavalor(String $campo,String $id,Request $request){
        if($request->input($id.$campo)!= null){
            return $request->input($id.$campo); 
        }else{
            return 0;
        }
    }
}



