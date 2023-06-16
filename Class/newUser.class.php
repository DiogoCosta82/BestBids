<?php
class User
{
   private string $last_name;
   private string $first_name;
   private string $email;
   private string $password;


   public function __construct($last_name, $first_name, $email, $password)
   {
      $this->last_name = $last_name;
      $this->first_name = $first_name;
      $this->email = $email;
      $this->password = $password;
   }

   public function getlastname()
   {
      return $this->last_name;
   }
   public function getfirstname()
   {
      return $this->first_name;
   }
   public function getemail()
   {
      return $this->email;
   }
   public function getpassword()
   {
      return $this->password;
   }



   public function setlastname($last_name)
   {
      return $this->last_name = $last_name;
   }
   public function setfirstname($first_name)
   {
      return $this->first_name = $first_name;
   }
   public function setemail($email)
   {
      return $this->email = $email;
   }
   public function setpassword($password)
   {
      return $this->password = $password;
   }
}
