<?php

class newUser
{
   private $last_name;
   private $first_name;
   private $email;
   private $password;

   public function __construct($last_name, $first_name, $email, $password)
   {
      $this->last_name = $last_name;
      $this->first_name = $first_name;
      $this->email = $email;
      $this->password = $password;
   }

   public function getLastName()
   {
      return $this->last_name;
   }

   public function getFirstName()
   {
      return $this->first_name;
   }

   public function getEmail()
   {
      return $this->email;
   }

   public function getPassword()
   {
      return $this->password;
   }

   public function setLastName($last_name)
   {
      $this->last_name = $last_name;
   }

   public function setFirstName($first_name)
   {
      $this->first_name = $first_name;
   }

   public function setEmail($email)
   {
      $this->email = $email;
   }

   public function setPassword($password)
   {
      $this->password = $password;
   }
}
