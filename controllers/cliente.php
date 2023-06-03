<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class Cliente extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        if (empty($_SESSION['correoCliente'])) {
            header('Location: ' . BASE_URL);
        }
        $data['title'] = 'Tu Perfil';
        $data['verificar'] = $this->model->getVerificar($_SESSION['correoCliente']);
        $this->views->getView('principal', "perfil", $data);
    }
    public function generarToken($correo)
    {
        $token = "papaschicas";
        $n = rand(1, 1000000);
        $x = md5(md5($token));
        $y = md5($x . $n);
        $token = md5($y);
        $token = md5($token . 'calamardo');
        $token = md5('patricio') . md5($token . $correo);
        return $token;
    }
    public function registroDirecto()
    {
        if (isset($_POST['nombre']) && isset($_POST['clave'])) {
            if (
                empty($_POST['nombre']) || empty($_POST['p_apellido']) || empty($_POST['s_apellido'])
                || empty($_POST['correo']) || empty($_POST['telefono']) || empty($_POST['clave'])
            ) {
                $mensage = array('msg' => 'Tienes que llenar todos los campos', 'icono' => 'warning');
            } else {
                $nombre = $_POST['nombre'];
                $p_apellido = $_POST['p_apellido'];
                $s_apellido = $_POST['s_apellido'];
                $correo = $_POST['correo'];
                $telefono = $_POST['telefono'];
                $clave = $_POST['clave'];
                $verificar = $this->model->getVerificar($correo);
                if (empty($verificar)) {
                    $hash = password_hash($clave, PASSWORD_DEFAULT);
                    $token = $this->generarToken($correo);
                    $data = $this->model->registroDirecto($nombre, $p_apellido, $s_apellido, $correo, $telefono, $hash, $token);
                    //$this->enviarCorreo($correo,$token);
                    if ($data > 0) {
                        $_SESSION['correoCliente'] = $correo;
                        $_SESSION['nombreCliente'] = $nombre;
                        $mensage = array('msg' => 'Registrado(a) con exito', 'icono' => 'success', 'token' => $token);
                    } else {
                        $mensage = array('msg' => 'Error al registrarse', 'icono' => 'error');
                    }
                } else {
                    $mensage = array('msg' => 'Ya existe una cuenta con este correo', 'icono' => 'warning');
                }
            }
            echo json_encode($mensage, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
    public function enviarCorreo()
    {
        if (isset($_POST['correo']) && isset($_POST['token'])) {
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = HOST_SMTP;                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = USER_SMTP;                     //SMTP username
                $mail->Password   = PASS_SMTP;                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = PORT_SMTP;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('18030558@itcelaya.edu.mx', TITLE);
                $mail->addAddress($_POST['correo']);     //Add a recipient

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Equipo de ' . TITLE;
                $mail->Body    = 'Verificación de correo electrónico <a href="' . BASE_URL . 'cliente/verificarCorreo/' . $_POST['token'] . '">Haz Click Aqui</a>';
                $mail->AltBody = 'Bienvenido a RLAB';

                $mail->send();
                $mensaje = array('msg' => 'Correo enviado', 'icono' => 'success');
            } catch (Exception $e) {
                $mensaje = array('msg' => 'Error al enviar el correo: ' . $mail->ErrorInfo, 'icono' => 'error');
            }
        } else {
            $mensaje = array('msg' => 'Error fatal', 'icono' => 'error');
        }
        echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function verificarCorreo($token)
    {
        $verificar = $this->model->getToken($token);
        if (!empty($verificar)) {
            $this->model->actualizarVerify($verificar['id_cliente']);
            header('location: ' . BASE_URL . 'cliente');
        }
    }
    public function loginDirecto()
    {
        if (isset($_POST['correoLogin']) && isset($_POST['claveLogin'])) {
            if (empty($_POST['correoLogin']) || empty($_POST['claveLogin'])) 
            {
                $mensage = array('msg' => 'Tienes que llenar todos los campos', 'icono' => 'warning');
            } else {
                $correo = $_POST['correoLogin'];
                $clave = $_POST['claveLogin'];
                $verificar = $this->model->getVerificar($correo);
                if (!empty($verificar)) {
                    if (password_verify($clave, $verificar['clave'])) {
                        $_SESSION['correoCliente'] = $verificar['correo'];
                        $_SESSION['nombreCliente'] = $verificar['nombre'];
                        $mensage = array('msg' => 'OK', 'icono' => 'success');
                    } else {
                        $mensage = array('msg' => 'Contraseña incorrecta', 'icono' => 'error');
                    }
                } else {
                    $mensage = array('msg' => 'El correo no existe', 'icono' => 'warning');
                }
            }
            echo json_encode($mensage, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
}
