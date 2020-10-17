<?php

   namespace Grayl\Gateway\Common\Controller;

   use Grayl\Gateway\Common\Entity\GatewayDataAbstract;
   use Grayl\Gateway\Common\Entity\RequestDataAbstract;
   use Grayl\Gateway\Common\Service\RequestServiceInterface;
   use Grayl\Gateway\Common\Service\ResponseServiceInterface;

   /**
    * Abstract class RequestControllerAbstract
    * The abstract class of the controller for all API based gateway request entities
    *
    * @package Grayl\Gateway\Common
    */
   abstract class RequestControllerAbstract implements RequestControllerInterface
   {

      /**
       * The GatewayDataAbstract object that holds the gateway API
       *
       * @var GatewayDataAbstract
       */
      protected GatewayDataAbstract $gateway_data;

      /**
       * The RequestDataAbstract object that holds request data
       *
       * @var RequestDataAbstract
       */
      protected RequestDataAbstract $request_data;

      /**
       * The RequestServiceInterface instance to interact with
       *
       * @var RequestServiceInterface
       */
      protected RequestServiceInterface $request_service;

      /**
       * The ResponseServiceInterface instance to interact with
       *
       * @var ResponseServiceInterface
       */
      protected ResponseServiceInterface $response_service;


      /**
       * The class constructor
       *
       * @param GatewayDataAbstract      $gateway_data     The GatewayDataAbstract object that holds the gateway API
       * @param RequestDataAbstract      $request_data     The RequestDataAbstract object that holds request data
       * @param RequestServiceInterface  $request_service  The RequestServiceInterface entity to use
       * @param ResponseServiceInterface $response_service The ResponseServiceInterface entity to use
       */
      public function __construct ( GatewayDataAbstract $gateway_data,
                                    RequestDataAbstract $request_data,
                                    RequestServiceInterface $request_service,
                                    ResponseServiceInterface $response_service )
      {

         // Set the class data
         $this->gateway_data = $gateway_data;
         $this->request_data = $request_data;

         // Set the service entities
         $this->request_service  = $request_service;
         $this->response_service = $response_service;
      }


      /**
       * Returns the gateway name
       *
       * @return string
       */
      public function getGatewayName (): string
      {

         // Return the name of the gateway
         return $this->gateway_data->getGatewayName();
      }


      /**
       * Returns the action performed in the request (send, get etc.)
       *
       * @return string
       */
      public function getAction (): string
      {

         // Return the action
         return $this->request_data->getAction();
      }


      /**
       * Returns the RequestDataAbstract object
       *
       * @return RequestDataAbstract
       */
      public function getRequestData (): object
      {

         // Return the request data object
         return $this->request_data;
      }


      /**
       * Sends the request data to the gateway and returns a response
       *
       * @return ResponseControllerAbstract
       * @throws \Exception
       */
      public function sendRequest (): object
      {

         // Send the request to the gateway using the service
         $response = $this->request_service->sendRequestDataEntity( $this->gateway_data,
                                                                    $this->request_data );

         // Return the response as a new ResponseControllerAbstract
         return $this->newResponseController( $response );
      }

   }