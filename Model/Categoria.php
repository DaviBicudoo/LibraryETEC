<?php
    namespace LibraryETEC\Model;

    use LibraryETEC\DAO\CategoriaDAO;
    use Exception;

    final class Categoria extends Model
    {
        public ?int $Id = null;

        public ?string $Descricao
        {
            set
            {
                if(strlen($value) < 10)
                    throw new Exception("A descrição deve conter no mínimo 10 caracteres");

                    $this->$Descricao = $value;
            }

            get => $this->Descricao ?? null;
        }


        // Não sei se está certo 
        
        function save() : Categoria
        {
            return new CategoriaDAO()->save($this);
        }

        function getById(int $id) : ?Aluno
        {
            return new CategoriaDAO()->selectById($id);
        }

        function getAllRows() // : array
        {
            $this->rows = new CategoriaDAO()->select();
        }

        function delete(int $id) : bool
        {
            return new CategoriaDAO()->delete($id);
        }

    }

?>