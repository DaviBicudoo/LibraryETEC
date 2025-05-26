<?php
    namespace LibraryETEC\Model;

    use LibraryETEC\DAO\LivroDao;
    use Exception;

    final class Livro extends Model
    {
        public ?int $Id = null;

        public ?string $Titulo
        {
            set
            {
                if(strlen($value) < 1)
                    throw new Exception("Título deve ter no mínimo 1 caracteres.");

                    $this->Titulo = $value;
            }

            get => $this->Nome ?? null;
        }

        public ?int $Isbn
        {
            set
            {
                if(strlen($value) != 13)
                    throw new Exception("ISBN deve conter 13 caracteres.");

                    $this->Isbn = $value;
            }

            get => $this->Nome ?? null;
        }

        public ?string $Editora
        {
            set
            {
                if(strlen($value) < 1)
                    throw new Exception("Editora deve ter no mínimo 1 caracteres.");

                    $this->Editora = $value;
            }

            get => $this->Nome ?? null;
        }

        public ?string $Ano // Não sei se está certo
        {
            set
            {
                if($value == null)
                    throw new Exception("Nome deve ter no mínimo 1 caracteres.");

                    $this->Ano ?? null;
            }

            get => $this->Ano ?? null;
        }

        function save() : Livro
        {
            return new LivroDAO()->save($this);
        }

        function getById(int $id) : ?Aluno
        {
            return new LivroDAO()->selectById($id);
        }

        function getAllRows() 
        {
            $this->rows = new LivroDAO()->select();
        }

        function delete(int $id) : bool
        {
            return new LivroDAO()->delete($id);
        }
    }
?>