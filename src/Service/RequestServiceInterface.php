<?php

   namespace Grayl\Gateway\Common\Service;

   use Grayl\Gateway\Common\Entity\GatewayDataAbstract;
   use Grayl\Gateway\Common\Entity\RequestDataAbstract;
   use Grayl\Gateway\Common\Entity\ResponseDataAbstract;

   /**
    * Interface RequestServiceInterface
    * This interface describes the service for all API based requests
    *
    * @package Grayl\Gateway\Common
    */
   interface RequestServiceInterface
   {

      /**
       * Sends a RequestDataAbstract to the gateway API and returns the response
       *
       * @param GatewayDataAbstract|object $gateway_data The gateway data entity instance to use
       * @param RequestDataAbstract|object $request_data The RequestDataAbstract to send
       *
       * @return ResponseDataAbstract
       * @throws \Exception
       */
      public function sendRequestDataEntity ( object $gateway_data,
                                              object $request_data ): object;


      /**
       * Creates a new gateway response object to handle data returned from the gateway
       *
       * @param object   $api_response The response object returned from an API gateway request
       * @param string   $gateway_name The name of the gateway
       * @param string   $action       The action performed in the original request (send, get etc.)
       * @param string[] $metadata     Extra data associated with this response (key => value format)
       *
       * @return ResponseDataAbstract
       */
      public function newResponseDataEntity ( object $api_response,
                                              string $gateway_name,
                                              string $action,
                                              array $metadata ): object;

   }