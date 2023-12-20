<?php 
namespace App\RepositoryInterface;

/**
 * He decidido crear el patron de Repository para que todo venga desde un contrato de  interface
 */
interface DigimonRepositoryInterface {

    public function paginate($page = 0);

    public function get(int $id);
}