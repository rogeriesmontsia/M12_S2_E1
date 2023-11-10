<?php

include_once('../../models/Database.php');

class User{

    private $id_user;
    private $email;
    private $password;
    private $username;
    private $firstname;
    private $lastname;
    private $city;
    private $postcode;
    private $telephone;
    private $profile_image;


     #Creem el constructor
    function __construct()
    {
         //obtengo un array con los parámetros enviados a la función
         $params = func_get_args();
         //saco el número de parámetros que estoy recibiendo
         $num_params = func_num_args();
         //cada constructor de un número dado de parámtros tendrá un first_namebre de función
         //atendiendo al siguiente modelo __construct1() __construct2()...
         $funcion_constructor = '__construct' . $num_params;
         //compruebo si hay un constructor con ese número de parámetros
         if (method_exists($this, $funcion_constructor)) {
             //si existía esa función, la invoco, reenviando los parámetros que recibí en el constructor original
             call_user_func_array(array($this, $funcion_constructor), $params);
         }
    }

    function __construct0()
    {
        $this->__construct1("Anonimo");
    }

    function __construct1($email)
    {
        $this->email = $email;
    }
    
    function __construct2($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }




    #Getters i setters

    function getid_user()
    {
        return $this->id_user;
    }

    function setid_user($id_user)
    {
        $this->id_user = $id_user;
    }

    function getEmail(){
        return $this->email;
    }

    function setEmail($email){
        $this->email=$email;
    }

    function getPassword(){
        return $this->password;
    }

    function setPassword($password){
        $this->password=$password;
    }

    function getUsername(){
        return $this->username;
    }

    function setUsername($username){
        $this->username = $username;
    }

    function getFirstname(){
        return $this->firstname;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    function getLastname(){
        return $this->lastname;
    }

    function setlastname($lastname) {
        $this->lastname = $lastname;
    }

    function getCity(){
        return $this->city;
    }

    function setCity($city){
        $this->city = $city;
    }

    function getPostCode(){
        return $this->postcode;
    }

    function setPostCOde($postcode){
        $this->postcode = $postcode;
    }

    function getTelephone() {
        return $this->telephone;
    }

    function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    function getprofile_image(){
        return $this->profile_image;
    }

    function setprofile_image($profile_image){
        $this->profile_image = $profile_image;
    }
    

    public static function showUser(){

        include_once "../../models/Database.php";

        $conn = conn();
        
        $correu = $_SESSION['mail_session'];

        $sql = "SELECT * FROM users WHERE email = '$correu'";

        $result = mysqli_query($conn, $sql);

        return $result;

    }





}