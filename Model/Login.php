<?php
    namespace LibraryETEC\Model;

    use LibraryETEC\DAO\LoginDAO;
    use Exception;

    final class Login extends Model
    {
        public $Id, $Email, $Senha, $Nome;

        public function logar() : ?Login
        {
            return new Login();
        }

    }

?>