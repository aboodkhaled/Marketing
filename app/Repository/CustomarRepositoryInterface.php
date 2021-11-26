<?php
namespace App\Repository;

interface CustomarRepositoryInterface{
    public function create_customar();
    public function create_item();
    public function store_customar($request);
    public function show_customar($id);
    public function edit_customar($id);
    public function update_customar($request);
    public function delete_customar($request);
    public function upload_customar($request);
    public function upitem_customar($request);
    public function download_customar($name_file);
    public function deletee_customar($request);
    public function deletee_item($request);
    public function oke($request);
}