<?php
    namespace LibraryETEC\Model;

use DateTime;
use LibraryETEC\DAO\EmprestimoDAO;
    use Exception;

    final class Emprestimo extends Model
    {
        public ?int $Id = null;

        public ?DateTime $Data_Emprestimo
        {
            set
            {
                $Data_Emprestimo = date("d.m.y");
            }

            get => $this->Data_Emprestimo ?? null;
        }

        public ?DateTime $Data_Devolucao
        {
            set
            {
                $Data_Devolucao = date("d.m.y");
            }

            get => $this->Data_Devolucao ?? null;
        }

        // Não sei a partir daq

        function save() : Emprestimo
        {
            return new EmprestimoDAO()->save($this);
        }

        function getById(int $id) : ?Aluno
        {
            return new EmprestimoDAO()->selectById($id);
        }

        function getAllRows() // : array
        {
            $this->rows = new EmprestimoDAO()->select();
        }

        function delete(int $id) : bool
        {
            return new EmprestimoDAO()->delete($id);
        }
    }
?>