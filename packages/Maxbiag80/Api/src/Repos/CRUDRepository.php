<?php

namespace Maxbiag80\Api\Repos;

/**
 * Interfaccia Repository CRUD
 */
interface CRUDRepository {
    
    /**
     * Caricamento model per ID
     * @param string $modelKey Chiave model
     * @param string $modelId Identificativo model
     * @return string Dati model serializzati in json
     */
    public function load($modelKey, $modelId);
    
    /**
     * Conta elementi in funzione dei dati specificati
     * @param string $modelKey Chiave model
     * @param string $queryData Struttura QueryData serializzata in base64
     * @return string Conteggio elementi
     */
    public function countQuery($modelKey, $queryData);
    
    /**
     * Caricamento dati model in funzione dei filtri specificati
     * @param string $modelKey Chiave model
     * @param string $queryData Struttura QueryData serializzata in base64
     * @return string Dati model serializzati in json
     */
    public function query($modelKey, $queryData);
    
    /**
     * Inserimento nuovo model
     * @param string $modelKey Chiave model
     * @return string Model inserito serializzato in json
     */
    public function insert($modelKey, $data);
    
    /**
     * Aggiornamento model
     * @param string $modelKey Chiave model
     * @param string $modelId Identificativo model
     * @return string Model aggiornato serializzato in json
     */
    public function update($modelKey, $modelId, $data);
    
    /**
     * Cancellazione model
     * @param string $modelKey Chiave model
     * @param string $modelId Identificativo model
     * @return string Model aggiornato serializzato in json
     */
    public function delete($modelKey, $modelId);
    
}