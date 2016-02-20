<?php

namespace Morganov\MailClient;
/* 
 * Transport class
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SocketTransport {
    
    private $soc       = null;
    private $connected = false;
    
    private $config;  // additional configuration
    
    private $timeout;
    private $target;

    function __construct( $config ) {

        // load default config
        $this->timeout = config('mail_client.transport.timeouts');
        
        // merge received config
        if ( $config ){
            foreach ( $this->timeout as $key => $value ){
                $this->timeout[$key] = !empty($config['timeout'][$key]) ?
                        $config['timeout'][$key] : $value;
            }
        }
    }
    
    protected function connect($config = false){
        // $config - куда и авторизация
        
        // new config set and connection established
        if ( !$config && $this->isConnected() ){
            $this->close();
        }
        
        // TODO: update config
        
        // TODO: add ipv6 support
        // Create TCP Socket for IPv4
        $this->soc = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        
        $ret = socket_connect($this->soc, 
                gethostbyname($this->target['host']), 
                $this->target['port']
                );
        
        if ( !$ret ){
            return false;
        }
        else {
            $this->connected = true;
        }
        return true;
    }
            
    
    public function getRemote(){
        return true;
    }
    
    public function getHost(){
        return isset($this->target['host']) ?
            $this->target['host'] : "";
    }
    
    public function getPort(){
        return isset( $this->target['port'] );
    }
    
    
    function __destruct() {
        $this->close();
    }
    
    private function close(){
        if ( $this->isConnected() ){
            $this->connected = false;
            socket_close($this->soc);
        }
        return;
    }
    
    public function isConnected(){
        return ( $this->connected && $this->soc ) ? true : false;
    }
    
}