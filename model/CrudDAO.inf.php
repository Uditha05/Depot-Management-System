<?php


interface CrudDAO extends SuperDAO{
    public function save($savable);

    public function update($updatable);

    public function delete($deletable);

    public function search($searchable);

    public function getAll();
}

?>

