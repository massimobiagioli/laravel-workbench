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
        $builder = $this->getQueryBuilder($modelKey, $queryData);
        return $builder->count();
    }

    public function query($modelKey, $queryData) {
        $builder = $this->getQueryBuilder($modelKey, $queryData);
        return $builder->get();
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
        // TODO: parametrizzare namespace di ricerca
        return '\\App\\Models\\' . $modelKey;
    }
    
    private function getWhereClauses($filters) {
        $whereClauses = [];
        foreach ($filters as $filter) {
            $whereClauses[] = [$filter['name'], $filter['operator'], $filter['value']];
        }
        return $whereClauses;
    }
    
    private function getSortingCriteria(&$builder, $sortingCriteria) {
        foreach ($sortingCriteria as $criteria) {
            $builder->orderBy($criteria['field'], $criteria['type']);
        }
    }
    
    private function getQueryBuilder($modelKey, $queryData) {
        $builder = $this->getModelName($modelKey)::where($this->getWhereClauses($queryData['filters']));
        $this->getSortingCriteria($builder, $queryData['sortingCriteria']);
        return $builder
            ->limit($queryData['limit'])
            ->offset($queryData['offset']);
    }
    
}