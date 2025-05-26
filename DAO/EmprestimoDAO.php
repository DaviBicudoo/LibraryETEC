<?php
    namespace LibraryETEC\DAO;

    use LibraryETEC\Model\Emprestimo;

    final class EmprestimoDAO extends DAO
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function save(Emprestimo $model) : Emprestimo
        {
            return ($model->Id == null) ? $this->insert($model) :
                $this->update($model);
        }

        public function insert(Emprestimo $model) : Emprestimo
        {
            $sql = "INSERT INTO aluno (data_emprestimo, data_devolucao) VALUES (?, ?) ";

            $stmt = parent::$conexao->prepare($sql);

            $stmt->bindValue(1, $model->Data_Emprestimo);
            $stmt->bindValue(2, $model->Data_Devolucao);
            $stmt->execute();

            $model->Id = parent::$conexao->lastInsertId();

            return $model;
        }

        public function update(Emprestimo $model) : Emprestimo
        {
            $sql = "UPDATE emprestimo SET data_emprestimo=?, data_devolucao=? WHERE id=? ";

            $stmt = parent::$conexao->prepare($sql);
            $stmt->bindValue(1, $model->Data_Emprestimo);
            $stmt->bindValue(2, $model->Data_Devolucao);
            $stmt->bindValue(3, $model->Id);
            $stmt->execute();

            return $model;
        }

        public function selectById(int $id) : ?Emprestimo
        {
            $sql = "SELECT * FROM emprestimo WHERE id=? ";

            $stmt = parent::$conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject("LibraryETEC\Model\Emprestimo");
        }

        public function select() : array
        {
            $sql = "SELECT * FROM emprestimo ";

            $stmt = parent::$conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(DAO::FETCH_CLASS, "LibraryETEC\Model\Emprestimo");
        }

        public function delete(int $id) : bool
        {
            $sql = "DELETE FROM emprestimo WHERE id=? ";

            $stmt = parent::$conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            return $stmt->execute();
        }
    }
?>