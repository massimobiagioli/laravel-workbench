<?php

namespace Maxbiag80\Api\Repos;

use Maxbiag80\Api\Repos\CRUDRepository;

/**
 * CRUD Repository - Implementazione Mock
 */
class CRUDRepositoryEloquent implements CRUDRepository {
    
    public function __construct() {
    }
    
    public function load($modelKey, $modelId) {
        return $this->getModelName($modelKey)::find($modelId);
    }
    
    public function countQuery($modelKey, $queryData) {
        
    }

    public function query($modelKey, $queryData) {
        
    }
    
    public function insert($modelKey, $data) {
        return $this->getModelName($modelKey)::create($data);
    }

    public function update($modelKey, $modelId, $data) {
        $model = $this->load($modelKey, $modelId);
        $result = $model->update($data);
        if (!$result) {
            return null;
        }
        return $model;
    }

    public function delete($modelKey, $modelId) {
        $model = $this->load($modelKey, $modelId);
        $result = $model->forceDelete();
        if (!$result) {
            return null;
        }
        return $model;
    }
    
    private function getModelName($modelKey) {
        return '\\App\\Models\\' . $modelKey;
    }
    
}