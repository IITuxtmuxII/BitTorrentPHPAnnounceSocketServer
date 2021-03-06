<?php

/*
// +--------------------------------------------------------------------------+
// | Project:    pdonvtracker - NetVision BitTorrent Tracker 2019             |
// +--------------------------------------------------------------------------+
// | This file is part of pdonvtracker. NVTracker is based on BTSource,       |
// | originally by RedBeard of TorrentBits, extensively modified by           |
// | Gartenzwerg.                                                             |
// +--------------------------------------------------------------------------+
// | Obige Zeilen dürfen nicht entfernt werden!    Do not remove above lines! |
// +--------------------------------------------------------------------------+
 */

class Logging
{
    private $basePath = '';
    private $logFile  = '';
    private $length   = 100;
    private $nl       = "\n";
    private $logFileFull = '';

    public function __construct($logType = 'query', $logMessage = ''){
        $this -> basePath    = __DIR__;
        $this -> logFile     = trim($logType) . '.log';
        $this -> logFileFull = $this -> basePath . $this -> logFile;
        $this -> logMessage($logMessage);
    }

    public function logMessage($logMessage = ''){
        if ( !empty($logMessage) AND strlen($logMessage) ){
            $logMessage = $this -> _getPre() . $logMessage . $this -> _getPost();
            file_put_contents($this -> logFileFull, $logMessage, FILE_APPEND | LOCK_EX);
        }
    }

    private function _getPre(){
        return date('d.m.Y H:i:s') . ' :: xxx :';
    }

    private function _getPost(){
        return $this -> nl . str_repeat('-', $this -> length) . $this -> nl;
    }
}
?>