<?php

return [
   /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | //
    |
    */
   
   /*
    |--------------------------------------------------------------------------
    | General limits
    |--------------------------------------------------------------------------
    |
    | // Limits: parse only headers, count emails for download, mail size etc.
    |
    */
   'limits' => [
      
   ],
   
   /*
    |--------------------------------------------------------------------------
    | General Transport Settings
    |--------------------------------------------------------------------------
    |
    | //
    |
    */
   'transport' => [
      'timeouts' => [ // in seconds
         'connect' => 5,
         'command' => 3,
         'answer'  => 3,
      ]
   ],
   
];