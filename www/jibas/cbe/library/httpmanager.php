<?
/**[N]**
 * JIBAS Education Community
 * Jaringan Informasi Bersama Antar Sekolah
 *
 * @version: 30.0 (Jan 24, 2024)
 * @notes: 
 *
 * Copyright (C) 2024 JIBAS (http://www.jibas.net)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 **[N]**/ ?>
<?php
require_once ("httprequest.php");

class HttpManager
{
    private $callback;
    private $timeout = 10000;

    private $execCode;
    private $state;
    private $status;
    private $session;
    private $data;

    function __construct($callback = "")
    {
        $this->callback = $callback;
    }

    function setTimeout($ms)
    {
        $this->timeout = $ms;
    }

    function setData($execCode, $state, $status, $session, $data)
    {
        $this->execCode = $execCode;
        $this->state = $state;
        $this->status = $status;
        $this->session = $session;
        $this->data = $data;
    }

    function buildParam()
    {
        $param  = "State=" . urlencode($this->state) . "&";
        $param .= "Status=" . urlencode($this->status) . "&";
        $param .= "Session=" . urlencode($this->session) . "&";
        $param .= "Data=" . urlencode($this->data);

        return $param;
    }

    function sendMainPort()
    {
        global $CBE_SERVER;

        try
        {
            $httpRequest = new HttpRequest($CBE_SERVER, 8104, "/", "POST");
            $httpRequest->setTimeout($this->timeout);
            $httpRequest->setQueryString($this->buildParam());

            return $httpRequest->send(); // return GenericReturn
        }
        catch (Exception $ex)
        {
            return new GenericReturn(-99, $ex->getMessage(), $ex);
        }
    }

    function send()
    {
        // Send Using Data Port

        global $CBE_SERVER;

        try
        {
            $dataPort = isset($_SESSION["DataPort"]) ? $_SESSION["DataPort"] : 8104;
            $httpRequest = new HttpRequest($CBE_SERVER, $dataPort, "/", "POST");
            $httpRequest->setTimeout($this->timeout);
            $httpRequest->setQueryString($this->buildParam());

            return $httpRequest->send(); // return GenericReturn
        }
        catch (Exception $ex)
        {
            return new GenericReturn(-99, $ex->getMessage(), $ex);
        }
    }

}
?>