<?php
namespace App\_Servicios;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class MailService{


    public function envioEmailReserva($email, $nombre, $fecha, $horaInstalacion, $evento, $HoraSalida, $servicicos, $valor, $titulo, $reserva){
        
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                
                //Recipients
            $mail->setFrom('admin@dreamproductora.cl', $titulo);
            $mail->addAddress($email,$nombre);     //Add a recipient
            $mail->addBCC('productoradream@gmail.com');

                //Content
                $mail->isHTML(true);      //Set
                $mail->Subject = $titulo;
                $mail->Body    .= '<p> Estimado(a) '.$nombre.':</p>';
                $mail->Body    .= '<p> Ha realizado una reserva con los siguientes datos emitida por el sistema de gestion Dreamproductora.</p>';
                $mail->Body    .= '<p> Fecha '.$fecha.'</p>';
    
                $mail->Body    .= '<p> Instalacion '.$horaInstalacion.'</p>';
                $mail->Body    .= '<p> Inicio      '.$evento.'</p>';
                $mail->Body    .= '<p> Retiro      '.$HoraSalida.'</p>';
    
                $mail->Body    .= '<p>'.implode(',',$servicicos).'</p>';
                
                $mail->Body    .= '<p> VALOR $'.number_format($valor,0,",",".").'</p>';
                
                $mail->Body    .= '<p>'.$reserva.'</p>';
    
                $mail->Body    .= '<p>Solicitamos revisar la informacion.</p>';
    
                $mail->Body    .= '<p> Atentamente,</p>';
                $mail->Body    .= '<p> Equipo Dreamproductora.cl</p>';
                
                
                $mail->Body    .= '<p><img src="https://dreamproductora.cl/logoProductora.jpeg" alt="Logotipo de HTML5"><br><br></p>';
                    
                    
            $mail->send();
 
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
    }


        public function envioEmailPresupuesto($fecha, $npresupuesto, $para, $email, $fono, $titulo, $lista){
            
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                
                //Recipients
            $mail->setFrom('admin@dreamproductora.cl', $titulo);
            $mail->addAddress($email,$para);     //Add a recipient
            //$mail->addBCC('productoradream@gmail.com');

                //Content
            $mail->isHTML(true);      //Set
            $mail->Subject = $titulo;

            $mail->Body    .= '<table width="750">';
            $mail->Body    .= '<tr>';
            $mail->Body    .= '<td><img src="https://dreamproductora.cl/logoProductora.jpeg" width="200"></td>';
            $mail->Body    .= '<td>';
            $mail->Body    .= '<p align="center">Productora Dream Spa, Rut: 76.531.101-2
                                                Av. Almirante Latorre #752 Los Angeles, Giro: Producción de Eventos
                                                Telefono: 432-540810 Cel- 77757976, productoradream@gmail.com</p>';
            $mail->Body    .= '</td>';
            $mail->Body    .= '</tr>';

            $mail->Body    .= '<tr>';
            $mail->Body    .= '<td>';
            $mail->Body    .= '<H3>PRESUPUESTO</H3>';
            $mail->Body    .= '</td>';
            $mail->Body    .= '</tr>';
            $mail->Body    .= '<tr>';
            $mail->Body    .= '<td>FECHA:</td>';
            $mail->Body    .= '<td>'.$fecha.'</td>';
            $mail->Body    .= '</tr>';

            $mail->Body    .= '<tr>';
            $mail->Body    .= '<td>PRESUPUESTO N°:</td>';
            $mail->Body    .= '<td>'.$npresupuesto.'</td>';
            $mail->Body    .= '</tr>';

            $mail->Body    .= '<tr>';
            $mail->Body    .= '<td>Para:</td>';
            $mail->Body    .= '<td>'.$para.'</td>';
            $mail->Body    .= '</tr>';

            $mail->Body    .= '<tr>';
            $mail->Body    .= '<td>Correo:</td>';
            $mail->Body    .= '<td>'.$email.'</td>';
            $mail->Body    .= '</tr>';

            $mail->Body    .= '<tr>';
            $mail->Body    .= '<td>Fono:</td>';
            $mail->Body    .= '<td>'.$fono.'</td>';
            $mail->Body    .= '</tr>';
            $mail->Body    .= '</table>';

            $mail->Body    .= '<table> ';
            $mail->Body    .= '<thead style="background:#7BCFF3">';
            $mail->Body    .= '<tr>';
            $mail->Body    .= '<th style="font-size:12px;">Servicio</th>';
            $mail->Body    .= '<th style="font-size:12px;">Valor</th>';
            $mail->Body    .= '<th style="font-size:12px;">Cant</th>';
            $mail->Body    .= '<th style="font-size:12px;">SubTotal</th>';
            $mail->Body    .= '</tr>';
            $mail->Body    .= '</thead>';

            $mail->Body    .= '<tbody id>';
            $valor1 = 0;
            $valor2 = 0;
            $valor3 = 0;
            foreach ($lista as $value) {
                $valor1 = $valor1 + $value['valor'];
                $valor2 = $valor2 + $value['cantidad'];
                $valor3 = $valor3 + $value['subtotal'];
                $mail->Body    .="<tr>";
                $mail->Body    .="<td>".$value['servicio']."</td>";
                $mail->Body    .="<td>".number_format($value['valor'],0,",",".")."</td>";
                $mail->Body    .="<td>".number_format($value['cantidad'],0,",",".")."</td>";
                $mail->Body    .="<td>".number_format($value['subtotal'],0,",",".")."</td>";
                $mail->Body    .="</tr>";
            }
            $mail->Body    .="<tr>";
            $mail->Body    .="<td>Produccion de evento general</td>";
            $mail->Body    .="<td>$".number_format($valor1,0,",",".")."</td>";
            $mail->Body    .="<td>$".number_format($valor2,0,",",".")."</td>";
            $mail->Body    .="<td>$".number_format($valor3,0,",",".")."</td>";
            $mail->Body    .="</tr>";

            $mail->Body    .="<tr>";
            $mail->Body    .="<td>NETO= $".number_format($valor3,0,",",".")."</td>";
            $mail->Body    .="</tr>";

                $iva = $valor3 * 0.19;
                $valoriva =  $valor3 + $iva;

            $mail->Body    .="<tr>";
            $mail->Body    .="<td>IVA= $".number_format($iva,0,",",".")."</td>";
            $mail->Body    .="</tr>";

            $mail->Body    .="<tr>";
            $mail->Body    .="<td>TOTAL= $".number_format($valoriva,0,",",".")."</td>";
            $mail->Body    .="</tr>";

            $mail->Body    .= '</tbody>';
            $mail->Body    .= '</table>';

            $mail->Body    .= '<table>';
            $mail->Body    .= '<tr>';
            $mail->Body    .= '<td><p>Esperando contar con una buena acogida de su parte. Saluda Atte.</p></td>';
            $mail->Body    .= '</tr>';
            $mail->Body    .= '</table> ';

            $mail->Body    .= '<table> ';
            $mail->Body    .= '<tr>';
            $mail->Body    .= '<td><p>Productora Dream Spa, Rut: 76.531.101-2</p></td>';
            $mail->Body    .= '</tr>';
            $mail->Body    .= '</table>';

   
            $mail->send();

            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
    }
}