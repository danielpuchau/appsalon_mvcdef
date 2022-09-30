<?php   
    namespace Classes;

    use PHPMailer\PHPMailer\PHPMailer;



    class Email {
        public $email;
        public $nombre;
        public $token;

        public function __construct($email, $nombre, $token)
        {
            $this->email= $email;
            $this->nombre= $nombre;
            $this->token= $token;
        }

        public function enviarConfirmacion(){
            //crear el objeto de email
            $email = new PHPMailer();

            //configurar SMTP
            $email->isSMTP();
            $email->Host = 'smtp.mailtrap.io';
            $email->SMTPAuth = true;
            $email->Username = 'f09c986dd25809';
            $email->Password = '8c7dfd1d579f0b';
            $email->SMTPSecure = 'tls';
            $email->Port = 2525; 

            //configurar el contenido del mail
            $email->setFrom('cuentas@appsalon.com');//deberia aparece el mail de quien nos envia el mensaje, pero le ponemos una direccion para que aparezcas luego en mail trap
            $email->addAddress('cuentas@appsalon.com', 'Appsalon.com');//a que mail va a llegar ese correo y el nombre
            $email->Subject = 'Confirma tu cuenta'; //asunto (primer texto que ve el usuario)

            //habilitar HTML
            $email->isHTML(true);
            $email->CharSet = 'UTF-8';

            //definir el contenido
            $contenido = '<html>';
            $contenido .= '<p><strong>Hola!' . $this->nombre . '<strong> Has creado tu cuenta en App Salon, solo debes confirmarla presionando el siguiente enlace</p>';
            $contenido .= '<p>Presiona aquí: <a href="http://localhost:3000/confirmar-cuenta?token=' . $this->token . '">Confirmar cuenta</a></p>';
            $contenido .= '<p>Si tu no solicitaste esta cuenta, por favor ignora este mensaje</p>';
            $contenido .= '</html>';

            //añadir el contenido al body del mail
            $email->Body = $contenido;

            //enviar mail
            $email->send();
        }

        public function enviarInstrucciones(){
            //crear el objeto de email
            $email = new PHPMailer();

            //configurar SMTP
            $email->isSMTP();
            $email->Host = 'smtp.mailtrap.io';
            $email->SMTPAuth = true;
            $email->Username = 'f09c986dd25809';
            $email->Password = '8c7dfd1d579f0b';
            $email->SMTPSecure = 'tls';
            $email->Port = 2525; 

            //configurar el contenido del mail
            $email->setFrom('cuentas@appsalon.com');//deberia aparece el mail de quien nos envia el mensaje, pero le ponemos una direccion para que aparezcas luego en mail trap
            $email->addAddress('cuentas@appsalon.com', 'Appsalon.com');//a que mail va a llegar ese correo y el nombre
            $email->Subject = 'Restablecer Contraseña'; //asunto (primer texto que ve el usuario)

            //habilitar HTML
            $email->isHTML(true);
            $email->CharSet = 'UTF-8';

            //definir el contenido
            $contenido = '<html>';
            $contenido .= '<p><strong>Hola!' . $this->nombre . '<strong> Has solicitado restablcer tu password, pulsa el siguienteenlace para hacerlo: </p>';
            $contenido .= '<a href="http://localhost:3000/recuperar?token=' . $this->token . '">Restablecer contraseña</a>';
            $contenido .= '<p>Si tu no solicitaste restablecer tu contraseña, por favor ignora este mensaje</p>';
            $contenido .= '</html>';

            //añadir el contenido al body del mail
            $email->Body = $contenido;

            //enviar mail
            $email->send();
        }
    }