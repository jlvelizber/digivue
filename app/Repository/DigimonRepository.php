<?php
namespace App\Repository;

use App\RepositoryInterface\DigimonRepositoryInterface;
use Illuminate\Support\Facades\Http;

/**
 * Clase encargada de realizar las interacciones con la API 
 */
class DigimonRepository implements DigimonRepositoryInterface
{

    const DEFAULT_PAGE_SIZE = 20;
    public string $apiUrl;



    public function __construct()
    {
        $this->apiUrl = env('APP_API_URL', "https://digi-api.com/api/v1/digimon");
    }

    /**
     * Extrae el listado de digimons de acuerdo a la pagina solicitada
     *
     * @param integer $page
     * @return array
     */
    public function paginate($page = 0)
    {
        $response = Http::get($this->apiUrl . "?pageSize=" . self::DEFAULT_PAGE_SIZE . "&page=$page");
        
        if($response->successful()) {
            return $response->json();
        }

        return [];
    }

    /**
     * Busca un digimon
     *
     * @param int $id : id del digimon
     * @return array Informacion del Dgimon | null si no lo encuentra
     */
    public function get(int $id)
    {
        $response = Http::get($this->apiUrl . "/".$id);
        if($response->successful()) {
            return $response->json();
        }
        return null;
    }
}
