<?php

namespace Morganov\MailClient;

use Morganov\MailClient\SocketTransport as MailTransport;

class MailClient extends MailTransport 
{
    function __construct($config) {
        parent::__construct($config);
        
        
    }
    
    
    public function LoadMails(){
        return $this->connect();
    }
}