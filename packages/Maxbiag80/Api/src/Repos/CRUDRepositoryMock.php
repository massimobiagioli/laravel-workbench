<?php

namespace Maxbiag80\Api\Repos;

use Maxbiag80\Api\Repos\CRUDRepository;

/**
 * CRUD Repository - Implementazione Mock
 */
class CRUDRepositoryMock implements CRUDRepository {
    
    private $data;
    
    public function __construct() {
        $this->data = [
            'soggetto' => [
                '1' => [
                    'id' => 1,
                    'nominativo' => 'Mario Rossi',
                    'indirizzo' => 'via roma 1, Jesi(AN)'
                ],
                '2' => [
                    'id' => 2,
                    'nominativo' => 'Anna Verdi',
                    'indirizzo' => 'via napoli 2, Apiro(MC)'                    
                ],
                '3' => [
                    'id' => 3,
                    'nominativo' => 'Marco Neri',
                    'indirizzo' => 'via ascoli piceno 3, Cingoli(MC)'                    
                ]
            ]
        ];
    }
    
    public function load($modelKey, $modelId) {
        return $this->data[$modelKey][$modelId];
    }
    
    public function countQuery($modelKey, $queryData) {
        // TODO: Applicare filtri e ordinamenti
        return count($this->data[$modelKey]);
    }

    public function query($modelKey, $queryData) {
        // TODO: Applicare filtri e ordinamenti
        $result = [];
        foreach ($this->data[$modelKey] as $row) {
            $result[] = $row;
        }
        return $result;
    }
    
    public function insert($modelKey, $data) {
        $id = count($this->data[$modelKey]) + 1;
        $data['id'] = $id;
        $this->data[$modelKey][$id] = $data;
        return $data;
    }

    public function update($modelKey, $modelId, $data) {
        $data['id'] = $modelId;
        $this->data[$modelKey][$modelId] = $data;
        return $data;
    }

    public function delete($modelKey, $modelId) {
        $deleted = $this->data[$modelKey][$modelId];
        unset($this->data[$modelKey][$modelId]);
        return $deleted;
    }

}