<?php
    namespace LibraryETEC\DAO;

    use LibraryETEC\Model\Livro;

    final class LivroDAO extends DAO
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function save(Livro $model) : Livro
        {
            return ($model->Id == null) ? $this->insert($model) :
                $this->update($model);
        }

        public function insert(Livro $model) : Livro
        {
            $sql = "INSERT INTO aluno (titulo, isbn, editora, ano) VALUES (?, ?, ?, ?) ";

            $stmt = parent::$conexao->prepare($sql);

            $stmt->bindValue(1, $model->Titulo);
            $stmt->bindValue(2, $model->Isbn);
            $stmt->bindValue(3, $model->Editora);
            $stmt->bindValue(3, $model->Ano);

            $stmt->execute();

            $model->Id = parent::$conexao->lastInsertId();

            return $model;
        }

        public function update(Livro $model) : Livro
        {
            $sql = "UPDATE aluno SET titulo=?, isbn=?, editora=?, ano=? WHERE id=? ";

            $stmt = parent::$conexao->prepare($sql);

            $stmt->bindValue(1, $model->Titulo);
            $stmt->bindValue(2, $model->Isbn);
            $stmt->bindValue(3, $model->Editora);
            $stmt->bindValue(3, $model->Ano);
            $stmt->bindValue(4, $model->Id);

            $stmt->execute();

            return $model;
        }

        public function selectById(int $id) : ?Livro
        {
            $sql = "SELECT * FROM aluno WHERE id=? ";

            $stmt = parent::$conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject("LibraryETEC\Model\Aluno");
        }

        public function select() : array
        {
            $sql = "SELECT * FROM livro ";

            $stmt = parent::$conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(DAO::FETCH_CLASS, "LibraryETEC\Model\Aluno");
        }

        public function delete(int $id) : bool
        {
            $sql = "DELETE FROM livro WHERE id=? ";

            $stmt = parent::$conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            return $stmt->execute();
        }
    }
?>