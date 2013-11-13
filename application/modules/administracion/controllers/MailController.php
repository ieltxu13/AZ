<?php

class Administracion_MailController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $mail = new Zend_Mail();

        $mail->addTo('ieltxu.alganaras@gmail.com', 'Ieltxu');
        $mail->setFrom('ialganaras@cominlavalle.com.ar', 'AZ Newsletter test');
        $mail->setSubject('Test');
        $mail->setBodyText('Test');
        $mail->send();
    }

    public function enviarMailAction()
    {
        $contactos = array(
               /* 0 => array('mail'=>'ieltxu.alganaras@gmail.com','persona'=>'Ieltxu Algañarás','usuario'=>'ialga'),
                1 => array('mail'=>'fernando.zerbetto36@gmail.com','persona'=>'Fernando Zerbetto','usuario'=>'fzerbett'),
                2 => array( 'mail'=>'gastoncottino@hotmail.com','persona'=>'Lic. Gastón Cottino','usuario'=>'infanto6'),
                3 => array('mail'=>'silvinacaballero@yahoo.com.ar','persona'=>'Lic. Silvina Caballero','usuario'=>'infantogar'),
                4 => array('mail'=>'celiapedone@hotmail.com','persona'=>'Lic. Celia Pedone','usuario'=>'norteoal'),
                5 => array('mail'=>'anamenconi10@yahoo.com.ar','persona'=>'Lic. Ana Menconi','usuario'=>'edfam'),
                6 => array('mail'=>'mrodriguezperera@gmail.com','persona'=>'Lic. Mauricio Rodríguez','usuario'=>'saludmental'),
                7 => array('mail'=>'elyhorn@yahoo.com.ar','persona'=>'Lic. Eli Horn','usuario'=>'juzgadovilla'),
                8 => array('mail'=>'luciainesd@yahoo.com.ar','persona'=>'Dra. Lucía Durán','usuario'=>'juzgadocosta'),
                9 => array('mail'=>'sergio.pino@osep.mendoza.gov.ar','persona'=>'Dr. Sergio Pino','usuario'=>'osep'),
                10 => array('mail'=>'celestebermejo@hotmail.com','persona'=>'Lic. Celeste Bermejo','usuario'=>'doaite5'),
                11 => array('mail'=>'adridiaz14@hotmail.com','persona'=>'Lic. Adriana  Díaz','usuario'=>'doaite6'),
                12 => array('mail'=>'lauratocchetto@yahoo.com.ar','persona'=>'Laura Tocchetto','usuario'=>'sicoli2019'),
                13 => array('mail'=>'dge4161@mendoza.edu.ar','persona'=>'Marcela Martínez','usuario'=>'granero4161'),
                14 => array('mail'=>'rominasa@hotmail.com','persona'=>'Romina Sastre','usuario'=>'granero4161'),
                15 => array('mail'=>'escuela@jbalberdi4026.edu.ar','persona'=>'Ana María Marino','usuario'=>'alberdi4026'),
                16 => array('mail'=>'fernandarias32@hotmail.com','persona'=>'Fernando Arias','usuario'=>'orientacion4231'),
                17 => array('mail'=>'claudiagdelia@hotmail.com','persona'=>'Claudia D’ Elía','usuario'=>'justo4041'),
                18 => array('mail'=>'dge4224@mendoza.edu.ar','persona'=>'María Cristina Flores','usuario'=>'orientacion4224'),
                19 => array('mail'=>'dge4159@mendoza.edu.ar','persona'=>'Gilda Zuzarte','usuario'=>'milstein4159'),
                20 => array('mail'=>'carlosmasoero4184@yahoo.com.ar','persona'=>'Susana Nacif','usuario'=>'masoero4184'),
                21 => array('mail'=>'dge4185@mendoza.edu.ar','persona'=>'Pedro Ahumada','usuario'=>'cagvanola4185'),
                22 => array('mail'=>'carlaadrianaherrera@hotmail.com','persona'=>'Carla Herrera','usuario'=>'francia4160'),
                23 => array('mail'=>'rosanalvarez17@yahoo.com','persona'=>'Lic. Rosana Alvarez','usuario'=>'zaldivar2043')
                24 => array('mail'=>'emilianomolina93@hotmail.com','persona'=>'Emiliano Molina','usuario'=>'socioeducativas'),*/
                25 => array('mail'=>'fernando.zerbetto36@gmail.com','persona'=>'Fernando Zerbetto','usuario'=>'fzerbett'),
                26 => array('mail'=>'ieltxu.alganaras@gmail.com','persona'=>'Ieltxu Algañarás','usuario'=>'ialga')
            );
        
        foreach ($contactos as $contacto) {
            $mail = new My_HtmlMailer();
            $mail->clearFrom();
        $mail->setSubject('MOL NEWSLETTER TEST')
                ->setFrom('contacto@azdesarrollo.com.ar','AZ desarrollo')
                ->addTo($contacto['mail'],$contacto['persona']);
        
        /*$at = $mail->createAttachment(file_get_contents(APPLICATION_PATH . '/imagenes/Instructivo.pdf'));
        $at->type        = 'application/pdf';
        $at->disposition = Zend_Mime::DISPOSITION_ATTACHMENT;
        $at->encoding = Zend_Mime::ENCODING_BASE64;
        $at->filename = "Instructivo.pdf";*/
        
        //$mail->setViewParam('usuario', $contacto['usuario']);
        $mail->sendHtmlTemplate('test.phtml');
        }
        
    }

}