<?php   
session_start();

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'access':
            $authController = new AuthController(); // Corrección del nombre de la clase

            $email = $_POST['correo'];
            $password = $_POST['contrasenna'];

            $authController->login($email, $password);
            break;
        
        default:
            header('Location: index.php');
            exit();
    }
}

class AuthController // Corrección del nombre de la clase
{
    public function login($email = null, $password = null)
    {  
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 3,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query(array( // Enviar como query string
                'email' => $email,
                'password' => $password
            )),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded', // Añadir cabecera de tipo
            ),
        ));

        $response = curl_exec($curl); 
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE); // Obtener el código de estado HTTP
        curl_close($curl); 
        $response = json_decode($response);

        // Guarda la respuesta en un archivo para depuración
        file_put_contents('debug.txt', print_r($response, true)); 

        // Verifica el código de estado y la respuesta
        if ($httpCode === 200 && isset($response->data->name)) {
            $_SESSION['user_data'] = $response->data;
            $_SESSION['user_id'] = $response->data->id;

            // Redirige a home.php después del inicio de sesión
            header('Location: home.php');
            exit();
        } else {
            // Maneja el error, puedes redirigir a un error o volver a la página de inicio
            $_SESSION['error_message'] = 'Error de inicio de sesión: ' . ($response->message ?? 'Credenciales incorrectas');
            header('Location: index.php'); // Redirige a la página de inicio
            exit();
        }
    }
}
