<?php
/*
 * Class User
 * A class to handle authentication of a user when logging in to a webpage. The users are stored in a database. 
 */
 
 class CUser{
 
 /*
 * Param $db holds an object instansiated from class CDatabase
 *
 */
 protected $db = null;
 
 
/*
 * The constructor takes a CDatabase object as input and stores it in the $db parameter
 *
 */
 public function __construct($db) {
 $this -> db = $db;
 }
  
/*
 * Function IsAuthenticatedUser checks if the user session is already active
 *
 */
   public function IsAuthenticatedUser()
   { 
    if(isset($_SESSION['user'])){
    return true;
    }
    else{
    return false;
    }   
   }
  
/*
 * Function outputAuthenticatedUser returns acronym and loginname if user is successfully logged in
 *
 */
    public function outputAuthenticatedUser()
    {
     $acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;
     if($acronym) {
     $output = "Du är inloggad som: $acronym ({$_SESSION['user']->name})";
     }
     else {
     $output = "Du är inte inloggad.";
     }
     return $output;
    }
    
    
/*
 * Function login checks if the acronym/ password is a valid user in the database
 *
 */
   public function login($user,$password)
   {
    $sql = "SELECT acronym, name FROM User WHERE acronym = ? AND password = md5(concat(?, salt))";
    $params = array(htmlentities($user),  htmlentities($password));
    $res=$this->db->ExecuteSelectQueryAndFetchAll($sql, $params);
    if(isset($res[0])) {
    $_SESSION['user'] = $res[0];
    return true;
    }
    else{ 
    return false;
    }
   }


/*
 * Function logout closes the session (user)
 *
 */
   public function logout(){
   unset($_SESSION['user']);}

    
}


