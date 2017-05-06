<?php

namespace Maxbiag80\Api\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Maxbiag80\Api\Repos\CRUDRepository;

/**
 * Controller per operazioni CRUD
 */
class CRUDController extends BaseController {
    
    private $repository;
    
    /**
     * Costruttore
     * @param CRUDRepository $repository Repository delegato ad eseguire le operazioni CRUD
     */
    public function __construct(CRUDRepository $repository) {
        $this->repository = $repository;
    }
    
    /**
     * Caricamento model per ID
     * @param Request $request Oggetto Request
     * @param string $modelKey Chiave model
     * @param string $modelId Identificativo model
     * @return string Dati model serializzati in json
     */
    public function load(Request $request, $modelKey, $modelId) {
        try {
            // Controlla precondizioni
            $this->loadPreconditions($request, $modelKey, $modelId);
            
            // Effettua caricamento dati utilizzando il repository
            $result = $this->repository->load($modelKey, $modelId);
            
            return response($result, 200);            
        } catch (\Exception $ex) {
            return response($ex->getMessage(), 500);
        }
    }
    
    private function loadPreconditions(Request $request, $modelKey, $modelId) {
        if (!$modelKey) {
            throw new \Exception("Parametro modelKey non impostato");
        }
        if (!$modelId) {
            throw new \Exception("Parametro modelId non impostato");
        }
    }
    
    /**
     * Conta elementi in funzione dei dati specificati
     * @param Request $request Oggetto Request
     * @param string $modelKey Chiave model
     * @param string $queryData Struttura QueryData serializzata in base64
     * @return string Conteggio elementi
     */
    public function countQuery(Request $request, $modelKey, $queryData) {
        try {
            // Decodifica QueryData
            $queryDataArray = json_decode(base64_decode($queryData), TRUE);
            
            // Controlla precondizioni
            $this->countQueryPreconditions($request, $modelKey, $queryDataArray);
            
            // Conta elementi utilizzando il repository
            $result = $this->repository->countQuery($modelKey, $queryDataArray);
            
            return response($result, 200); 
        } catch (Exception $ex) {
            return response($ex->getMessage(), 500);
        }
    }
    
    private function countQueryPreconditions(Request $request, $modelKey, $queryDataArray) {
        if (!$modelKey) {
            throw new \Exception("Parametro modelKey non impostato");
        }
    }
    
    /**
     * Caricamento dati model in funzione dei filtri specificati
     * @param Request $request Oggetto Request
     * @param string $modelKey Chiave model
     * @param string $queryData Struttura QueryData serializzata in base64
     * @return string Dati model serializzati in json
     */
    public function query(Request $request, $modelKey, $queryData) {
        try {
            // Decodifica QueryData
            $queryDataArray = json_decode(base64_decode($queryData), TRUE);
            
            // Controlla precondizioni
            $this->queryPreconditions($request, $modelKey, $queryDataArray);
            
            // Carica elementi utilizzando il repository
            $result = $this->repository->query($modelKey, $queryDataArray);
            
            return response($result, 200); 
        } catch (Exception $ex) {
            return response($ex->getMessage(), 500);
        }
    }
    
    private function queryPreconditions(Request $request, $modelKey, $queryDataArray) {
        if (!$modelKey) {
            throw new \Exception("Parametro modelKey non impostato");
        }
    }
    
    /**
     * Inserimento nuovo model
     * @param Request $request Oggetto Request
     * @param string $modelKey Chiave model
     * @return string Model inserito serializzato in json
     */
    public function insert(Request $request, $modelKey) {
        try {
            // Legge elemento da inserire da oggetto request
            $data = json_decode($request->getContent(), TRUE);
            
            // Controlla precondizioni
            $this->insertPreconditions($request, $modelKey, $data);
            
            // Inserisce elemento utilizzando il repository
            $result = $this->repository->insert($modelKey, $data);
            
            return response($result, 200); 
        } catch (Exception $ex) {
            return response($ex->getMessage(), 500);
        }
    }
    
    private function insertPreconditions(Request $request, $modelKey, $data) {
        if (!$modelKey) {
            throw new \Exception("Parametro modelKey non impostato");
        }
    }
    
    /**
     * Aggiornamento model
     * @param Request $request Oggetto Request
     * @param string $modelKey Chiave model
     * @param string $modelId Identificativo model
     * @return string Model aggiornato serializzato in json
     */
    public function update(Request $request, $modelKey, $modelId) {
        try {
            // Legge elemento da inserire da oggetto request
            $data = json_decode($request->getContent(), TRUE);
            
            // Controlla precondizioni
            $this->updatePreconditions($request, $modelKey, $modelId, $data);
            
            // Aggiorna elemento utilizzando il repository
            $result = $this->repository->update($modelKey, $modelId, $data);
            if ($result === null) {
                return response('Errore aggiornamento model', 500);
            }
            return response($result, 200); 
        } catch (Exception $ex) {
            return response($ex->getMessage(), 500);
        }
    }
    
    private function updatePreconditions(Request $request, $modelKey, $modelId, $data) {
        if (!$modelKey) {
            throw new \Exception("Parametro modelKey non impostato");
        }
    }
    
    /**
     * Cancellazione model
     * @param Request $request Oggetto Request
     * @param string $modelKey Chiave model
     * @param string $modelId Identificativo model
     * @return string Model cancellato serializzato in json
     */
    public function delete(Request $request, $modelKey, $modelId) {
        try {
            // Controlla precondizioni
            $this->deletePreconditions($request, $modelKey, $modelId);
            
            // Cancella elemento utilizzando il repository
            $result = $this->repository->delete($modelKey, $modelId);
            
            return response($result, 200); 
        } catch (Exception $ex) {
            return response($ex->getMessage(), 500);
        }
    }
    
    private function deletePreconditions(Request $request, $modelKey, $modelId) {
        if (!$modelKey) {
            throw new \Exception("Parametro modelKey non impostato");
        }
    }
    
}