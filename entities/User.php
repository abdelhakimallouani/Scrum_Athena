<?php

class User
{
    protected $idUser;
    protected $nomComplet;
    protected $email;
    protected $password;
    protected $role;

    public function __construct($nomComplet, $email, $password, $role)
    {
        $this->nomComplet = $nomComplet;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    public function getNomComplet()
    {
        return $this->nomComplet;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getRole()
    {
        return $this->role;
    }
}
