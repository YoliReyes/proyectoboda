<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Annie+Use+Your+Telescope" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">


       
    </head>

    <body style="text-align:center">
        <div>
        @if($_REQUEST['confirmado'] == 0)
            <img width="100%" src="{{ $message->embed(public_path().'/images/gracias-mail.jpg')}}" alt="Nos casamos">                    
        @else
            <img width="100%" src="{{ $message->embed(public_path().'/images/cambio-datos.jpg')}}" alt="Nos casamos">                    
        @endif

        </div>
       
        		<table style="width:100%">
                 <tr>
                        <td style="background-color:#4b2648;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;color:white;">Nombre del Invitado</th> 
                        <td style="background-color:#4b2648;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;color:white;">¿Asiste?</th> 
                        <td style="background-color:#4b2648;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;color:white;">Comida</th> 
                        <td style="background-color:#4b2648;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;color:white;">Café</th> 
                        <td style="background-color:#4b2648;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;color:white;">Recena</th> 
                        <td style="background-color:#4b2648;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;color:white;">Menú</th> 
                    </tr>

                    @php
                        $contador = (int)$_REQUEST['id'];
                        $seguir = true;
                    @endphp

                        @while( $seguir == true )

                            @if(isset($_REQUEST[$contador.'nombre']))

                                <tr>
                                    <td style="background-color:#ad5385;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">{{$_REQUEST[ $contador.'nombre' ]}}</td>

                                    @if($_REQUEST[$contador.'asiste'] == 1)
                                        <td style="background-color:#d279a6;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">SI</td>
                                    @else
                                        <td style="background-color:#d279a6;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">NO</td>
                                    @endif

                                    @if(isset($_REQUEST[$contador.'comida']))
                                        <td style="background-color:#d98cb3;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">SI</td>
                                        <td style="background-color:#df9fbf;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">SI</td>
                                    @else
                                        <td style="background-color:#d98cb3;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">NO</td>
                                        
                                        @if(isset($_REQUEST[$contador.'postre']))
                                            <td style="background-color:#df9fbf;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">SI</td>
                                        @else
                                            <td style="background-color:#df9fbf;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">NO</td>
                                        @endif  
                                    
                                    @endif  

                                    

                                    @if(isset($_REQUEST[$contador.'recena']))
                                        <td style="background-color:#e6b3cc;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">SI</td>
                                    @else
                                        <td style="background-color:#e6b3cc;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">NO</td>
                                    @endif  

                                    @if(isset($_REQUEST[$contador.'especial']))
                                        
                                        @if($_REQUEST[$contador.'asiste'] == 1)

                                            @if($_REQUEST[$contador.'especial']!="")
                                                <td style="background-color:#ecc6d9;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px">{{$_REQUEST[$contador.'especial']}}</td>
                                            @else
                                                 <td style="background-color:#ecc6d9;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px">Menú Normal</td>
                                            @endif
                                        @else
                                            <td style="background-color:#ecc6d9;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px">Sin Menú</td>
                                        @endif 
                                    @else
                                        <td style="background-color:#ecc6d9;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px">Sin Menú</td>
                                    @endif  

                                </tr>

                                @php 
                                    $contador++;
                                @endphp

                            @else
                                @php 
                                    $seguir=false;
                                @endphp
                            @endif
                        @endwhile


                            <!-- fila acompañante -->
                            @if(isset($_REQUEST['acompananteasiste']))

                                <tr>
                                    <td style="background-color:#ad5385;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">{{$_REQUEST[ 'acompanantenombre' ]}}</td>
                                    <td style="background-color:#d279a6;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">SI</td>
                                  

                                    @if(isset($_REQUEST['acompanantecomida']))
                                        <td style="background-color:#d98cb3;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">SI</td>
                                        <td style="background-color:#df9fbf;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">SI</td>
                                    @else
                                        <td style="background-color:#d98cb3;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">NO</td>
                                        
                                        @if(isset($_REQUEST['acompanantepostre']))
                                            <td style="background-color:#df9fbf;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">SI</td>
                                        @else
                                            <td style="background-color:#df9fbf;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">NO</td>
                                        @endif  
                                    
                                    @endif  

                                    

                                    @if(isset($_REQUEST['acompananterecena']))
                                        <td style="background-color:#e6b3cc;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">SI</td>
                                    @else
                                        <td style="background-color:#e6b3cc;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">NO</td>
                                    @endif  

                                    @if(isset($_REQUEST['acompananteespecial']))
                                        
                                        @if($_REQUEST['acompananteasiste'] == 1)

                                            @if($_REQUEST['acompananteespecial']!="")
                                                <td style="background-color:#ecc6d9;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px">{{$_REQUEST['acompananteespecial']}}</td>
                                            @else
                                                <td style="background-color:#ecc6d9;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px">Menú Normal</td>
                                            @endif
                                        @else
                                            <td style="background-color:#ecc6d9;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px">Sin Menú</td>
                                        @endif 
                                    @else
                                        <td style="background-color:#ecc6d9;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px">Sin Menú</td>
                                    @endif  

                                </tr>
                            @else      

                                @if(isset($_REQUEST['acompanante']))

                                    <tr>
                                        <td style="background-color:#ad5385;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">{{$_REQUEST[ $_REQUEST['acompanante'].'nombre' ]}}</td>
                                        <td style="background-color:#d279a6;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">SI</td>
                                    

                                        @if(isset($_REQUEST[$_REQUEST['acompanante'].'comida']))
                                            <td style="background-color:#d98cb3;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">SI</td>
                                            <td style="background-color:#df9fbf;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">SI</td>
                                        @else
                                            <td style="background-color:#d98cb3;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">NO</td>
                                            
                                            @if(isset($_REQUEST[$_REQUEST['acompanante'].'postre']))
                                                <td style="background-color:#df9fbf;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">SI</td>
                                            @else
                                                <td style="background-color:#df9fbf;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">NO</td>
                                            @endif  
                                        
                                        @endif  

                                        

                                        @if(isset($_REQUEST[$_REQUEST['acompanante'].'recena']))
                                            <td style="background-color:#e6b3cc;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">SI</td>
                                        @else
                                            <td style="background-color:#e6b3cc;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px;">NO</td>
                                        @endif  

                                        @if(isset($_REQUEST[$_REQUEST['acompanante'].'especial']))
                                            
                                            @if($_REQUEST[$_REQUEST['acompanante'].'asiste'] == 1)

                                                @if($_REQUEST[$_REQUEST['acompanante'].'especial']!="")
                                                    <td style="background-color:#ecc6d9;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px">{{$_REQUEST[$_REQUEST['acompanante'].'especial']}}</td>
                                                @else
                                                    <td style="background-color:#ecc6d9;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px">Menú Normal</td>
                                                @endif
                                            @else
                                                <td style="background-color:#ecc6d9;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px">Sin Menú</td>
                                            @endif 
                                        @else
                                            <td style="background-color:#ecc6d9;border-radius: 5px 5px 5px 5px;height:20px;padding-bottom:5px;padding-top:5px;padding-right:10px;padding-left:10px">Sin Menú</td>
                                        @endif  

                                    </tr>
                                @endif  
                            @endif                
            </table>   

            <img style="margin-top:30px" width="100%" src="{{ $message->embed(public_path().'/images/confeti-mail.jpg')}}" alt="nota-importante">                    
     
    </body>
</html>









 
 
