<?php

require_once 'Database.php';

class User
{
    private $conn;
    private $table_name = "users";
    private $id;
    private $email;
    private $role;
    private $userName;
    private $firstName;
    private $lastName;
    private $telephone;
    private $profile_image;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();

        if (!$this->conn) {
            die("Error de conexión a la base de datos");
        }
    }


    public function createUser($email, $pass, $nom)
    {
        try {
            $query = "INSERT INTO " . $this->table_name . "(
                        email, 
                        password, 
                        username
                        ) 
                      VALUES (
                        :email, 
                        :pass, 
                        :username
                        )";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':pass', $pass);
            $stmt->bindParam(':username', $nom);

            $stmt->execute();
        } catch (Exception $e) {
            echo ("Error en el controlador: " . $e->getMessage());
        }
    }

    // function login 

    public function login($email, $password)
    {
        try {
            $query = "SELECT id_user, email, role, username FROM " . $this->table_name . " 
                      WHERE email = :email AND password = :password";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $this->id = $user['id_user'];
                $this->email = $user['email'];
                $this->role = $user['role'];
                $this->userName = $user['username'];
                return true; // Usuario autenticado, se devuelve su información
            } else {
                return false; // Las credenciales no coinciden, el inicio de sesión falló
            }
        } catch (PDOException $e) {
            echo "Error en el controlador: " . $e->getMessage();
            return false; // Error al realizar el inicio de sesión
        }
    }

    public function view_user_info()
    {
        // Inicia la sesión para acceder a las variables de sesión
        session_start();

        // Verifica si el usuario está logueado
        if (isset($_SESSION['user_id'])) {
            // Crear una instancia de la clase Database
            $database = new Database();

            // Intentar la conexión a la base de datos
            $conn = $database->connect();

            if ($conn) {
                try {
                    // Consulta para obtener los datos del usuario logueado
                    $query = "SELECT * FROM users WHERE id_user = :user_id";
                    $stmt = $conn->prepare($query);
                    $stmt->bindParam(':user_id', $_SESSION['user_id']);
                    $stmt->execute();

                    // Obtener los resultados como un arreglo asociativo
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Cerrar la conexión
                    $conn = null;

                    return $user;
                } catch (PDOException $e) {
                    echo "Error en el controlador: " . $e->getMessage();
                    return false; // Error al obtener la información del usuario
                }
            }
        }

        return false; // Si el usuario no está logueado
    }


    public function edit_profile($newFirstName, $newLastName, $newUsername, $newEmail, $newTelephone)
    {
        try {
            // Obtener los datos del usuario
            $user = $this->view_user_info();

            if (!$user) {
                return 'El usuario no está logueado.'; // No se pudo obtener la información del usuario
            }

            // Verificar si se han realizado cambios en los datos
            if (
                $newFirstName === $user['firstname'] &&
                $newLastName === $user['lastname'] &&
                $newUsername === $user['username'] &&
                $newEmail === $user['email'] &&
                $newTelephone === $user['telephone']
            ) {
                return true; // No se realizaron cambios
            }

            // Actualizar los datos del usuario en la base de datos
            $query = "UPDATE users SET 
                firstname = :firstname,
                lastname = :lastname,
                username = :username,
                email = :email,
                telephone = :telephone
            WHERE id_user = :user_id";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':firstname', $newFirstName);
            $stmt->bindParam(':lastname', $newLastName);
            $stmt->bindParam(':username', $newUsername);
            $stmt->bindParam(':email', $newEmail);
            $stmt->bindParam(':telephone', $newTelephone);
            $stmt->bindParam(':user_id', $user['id_user']);

            // Ejecutar la actualización
            $stmt->execute();

            // Verificar si se realizó la actualización correctamente
            if ($stmt->rowCount() > 0) {
                return true; // Actualización exitosa
            } else {
                return 'No se realizó ningún cambio.'; // No se actualizó ningún registro
            }
        } catch (Exception $e) {
            // Devolver el mensaje de error
            return $e->getMessage(); // Error al actualizar
        }
    }

    public function changeImage($userId, $newImagePath)
    {
        $query = "UPDATE users SET profile_image = :newImagePath WHERE id_user = :userId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':newImagePath', $newImagePath);
        $stmt->bindParam(':userId', $userId);

        return $stmt->execute();
    }




    public function getId()
    {
        return $this->id; // Asumiendo que tienes una propiedad "id" en tu clase
    }

    public function getEmail()
    {
        return $this->email; // Asumiendo que tienes una propiedad "email" en tu clase
    }

    public function getRole()
    {
        return $this->role; // Asumiendo que tienes una propiedad "email" en tu clase
    }

    public function getUsername()
    {
        return $this->userName;
    }
}
