<?php
    namespace LibraryETEC\Model;

    use LibraryETEC\DAO\AlunoDAO;
    use Exception;

    final class Autor extends Model
    {
        public ?int $Id = null;

        public ?string $Nome
        {
            set
            {
                if(strlen($value) < 4)
                    throw new Exception("Nome deve ter no mínimo 4 caracteres.");

                    $this->Nome = $value;
            }

            get => $this->Nome ?? null;
        }

        public ?string $Data_Nascimento
        {
            set
            {
                if(empty($value))
                    throw new Exception("Preencha a data de nascimento.");

                    $this->Data_Nascimento ?? null;
            }

            get => $this->Data_Nascimento ?? null;
        }

        public ?string $CPF
        {
            set
            {
                if(strlen($value) != 11)
                    throw new Exception("CPF deve conter 11 caracteres.");

                    $this->CPF = $value;
            }

            get => $this->CPF ?? null;
        }

        function save() : Autor
        {
            return new AutorDAO()->save($this);
        }

        function getById(int $id) : ?Autor
        {
            return new AutorDAO()->selectById($this);
        }

        function getAllRows() : array
        {
            $this->rows = new AutorDAO()->select();
        }

        function delete(int $id) : bool
        {
            return new AutorDAO()->delete($id);
        }
    }

?>