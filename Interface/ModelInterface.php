<?php

interface ModelInterface {
    public function create($datas);
    public function all();
    public function find($id);
    public function update($id, $datas);
    public function delete($id);
}