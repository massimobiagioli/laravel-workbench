<?php

return [
    
    /*
     * Tipo Repository
     */
    'repositoryType' => 'mock',
    
    /*
     * Middlewares da utilizzare
     */
    'middlewares' => ['jwt.auth', 'jwt.refresh']
    
];