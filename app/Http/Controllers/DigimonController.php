<?php

namespace App\Http\Controllers;

use App\RepositoryInterface\DigimonRepositoryInterface;
use Inertia\Response;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DigimonController extends Controller
{
    

    public DigimonRepositoryInterface $digiRepo;

    /**
     * Inyeccion de dependencia de DigimonRepository
     *
     * @param DigimonRepositoryInterface $digiRepo
     */
    public function __construct(DigimonRepositoryInterface $digiRepo) 
    {
        $this->digiRepo = $digiRepo;
    }


    /**
     * Muestra una pagina con el listado de digimons
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) : Response 
    {

        $page = $request->query('page') ? $request->query('page') :  0;
      
        $digimonList = $this->digiRepo->paginate($page);
      
        return Inertia::render('Dashboard', ['digimonList' => $digimonList]);
        

    }
    
    /**
     * Muestra la informacion de un digimon
     *
     * @param integer $id
     * @return Response
     */
    public function show(int $id): Response
    {
       
       $digimon = $this->digiRepo->get($id);

       if(!$digimon) return response("Digmon no existe");

       return Inertia::render('DigimonDetail', ['digimon' => $digimon]);
    }


}
