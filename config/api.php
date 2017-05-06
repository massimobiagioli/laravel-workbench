<?php

return [
    
    /*
     * Tipo Repository
     * -mock
     * -eloquent
     */
    'repositoryType' => 'eloquent',
    
    /*
     * Middlewares da utilizzare
     */
    'middlewares' => ['jwt.auth', 'jwt.refresh']
    
];