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

    public function login($email, $password_md5)
    {
        try {
            $query = "SELECT id_user, email, role, username FROM " . $this->table_name . " 
                      WHERE email = :email AND password = :password";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password_md5);

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
        if (isset($_SESSION['id_user'])) {
            // Crear una instancia de la clase Database
            $database = new Database();

            // Intentar la conexión a la base de datos
            $conn = $database->connect();

            if ($conn) {
                try {
                    // Consulta para obtener los datos del usuario logueado
                    $query = "SELECT * FROM users WHERE id_user = :id_user";
                    $stmt = $conn->prepare($query);
                    $stmt->bindParam(':id_user', $_SESSION['id_user']);
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


    public function edit_profile($newFirstName, $newLastName, $newUsername, $newCity, $newEmail, $newTelephone)
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
                $newCity === $user['city'] &&
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
                city = :city,
                email = :email,
                telephone = :telephone
            WHERE id_user = :id_user";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':firstname', $newFirstName);
            $stmt->bindParam(':lastname', $newLastName);
            $stmt->bindParam(':username', $newUsername);
            $stmt->bindParam(':city', $newCity);
            $stmt->bindParam(':email', $newEmail);
            $stmt->bindParam(':telephone', $newTelephone);
            $stmt->bindParam(':id_user', $user['id_user']);

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

    public function changeImage($userId, $newImageName)
    {
        try {
            // Actualizar la ruta de la imagen en la base de datos
            $query = "UPDATE users SET profile_image = :newImageName WHERE id_user = :userId";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':newImageName', $newImageName);
            $stmt->bindParam(':userId', $userId);

            return $stmt->execute();
        } catch (Exception $e) {
            // Manejar la excepción (puedes personalizar esto según tus necesidades)
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function deleteImage()
    {
        try {
            // Obtener los datos del usuario
            $user = $this->view_user_info();

            if (!$user) {
                return 'El usuario no está logueado.'; // No se pudo obtener la información del usuario
            }

            // Verificar si el usuario ya tiene una imagen para eliminar
            if (empty($user['profile_image'])) {
                return 'No hay ninguna imagen para eliminar.';
            }

            // Eliminar el archivo de imagen del servido
            $imagePath = '../views/perfil_personal/perfil_images/' . $user['profile_image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Establecer el campo profile_image en null en la base de datos
            $query = "UPDATE users SET profile_image = null WHERE id_user = :id_user";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id_user', $user['id_user']);

            // Ejecutar la actualización
            $stmt->execute();

            // Verificar si se realizó la actualización correctamente
            if ($stmt->rowCount() > 0) {
                return true; // Eliminación exitosa
            } else {
                return 'Error al eliminar la imagen en la base de datos.';
            }
        } catch (Exception $e) {
            // Devolver el mensaje de error
            return 'Error: ' . $e->getMessage();
        }
    }

    public function changePassword($currentPassword, $newPassword, $confirmPassword)
{
    try {
        // Obtener los datos del usuario
        $user = $this->view_user_info();

        if (!$user) {
            return 'El usuario no está logueado.'; // No se pudo obtener la información del usuario
        }

        // Verificar si la contraseña actual coincide
        $currentPasswordFromDB = $user['password'];
        if (!password_verify(trim($currentPassword), $currentPasswordFromDB)) {
            // Antes de llamar a password_verify
            echo "Contraseña actual proporcionada: " . $currentPassword;
            echo "Contraseña almacenada en la base de datos: " . $currentPasswordFromDB;
            return 'La contraseña actual es incorrecta.';
        }

        // Verificar si la nueva contraseña y su confirmación coinciden
        if ($newPassword !== $confirmPassword) {
            return 'La nueva contraseña y la confirmación no coinciden.';
        }

        // Encriptar la nueva contraseña con bcrypt
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        // Actualizar la contraseña en la base de datos
        $query = "UPDATE users SET password = :newPassword WHERE id_user = :id_user";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':newPassword', $hashedPassword);
        $stmt->bindParam(':id_user', $user['id_user']);

        // Ejecutar la actualización
        $stmt->execute();

        // Verificar si se realizó la actualización correctamente
        if ($stmt->rowCount() > 0) {
            return true; // Cambio de contraseña exitoso
        } else {
            return 'Error al cambiar la contraseña en la base de datos.';
        }
    } catch (Exception $e) {
        // Devolver el mensaje de error
        return 'Error: ' . $e->getMessage();
    }
}








    public function getId()
    {
        return $this->id; 
    }

    public function getEmail()
    {
        return $this->email; 
    }

    public function getRole()
    {
        return $this->role; 
    }

    public function getUsername()
    {
        return $this->userName;
    }
}
