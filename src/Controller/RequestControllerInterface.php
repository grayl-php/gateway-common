<?php

   namespace Grayl\Gateway\Common\Controller;

   use Grayl\Gateway\Common\Entity\RequestDataAbstract;
   use Grayl\Gateway\Common\Entity\ResponseDataAbstract;

   /**
    * Interface RequestControllerInterface
    * This interface describes the controller for all API based gateway requests
    *
    * @package Grayl\Gateway\Common
    */
   interface RequestControllerInterface
   {

      /**
       * Returns the gateway name
       *
       * @return string
       */
      public function getGatewayName (): string;


      /**
       * Returns the action performed in the request (send, get etc.)
       *
       * @return string
       */
      public function getAction (): string;


      /**
       * Returns the RequestDataAbstract object
       *
       * @return RequestDataAbstract
       */
      public function getRequestData (): object;


      /**
       * Sends the request data to the gateway and returns a response
       *
       * @return ResponseControllerAbstract
       * @throws \Exception
       */
      public function sendRequest (): object;


      /**
       * Creates a new ResponseControllerAbstract to handle data returned from the gateway
       *
       * @param ResponseDataAbstract|object $response_data The ResponseDataAbstract entity received from the gateway
       *
       * @return ResponseControllerAbstract
       */
      public function newResponseController ( object $response_data ): object;

   }