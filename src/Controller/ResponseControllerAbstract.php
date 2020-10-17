<?php

   namespace Grayl\Gateway\Common\Controller;

   use Grayl\Gateway\Common\Entity\ResponseDataAbstract;
   use Grayl\Gateway\Common\Service\ResponseServiceInterface;

   /**
    * Abstract class ResponseControllerAbstract
    * The abstract class of the controller for all API based gateway response entities
    *
    * @package Grayl\Gateway\Common
    */
   abstract class ResponseControllerAbstract implements ResponseControllerInterface
   {

      /**
       * The ResponseDataAbstract object that holds the gateway API response
       *
       * @var ResponseDataAbstract
       */
      protected ResponseDataAbstract $response_data;

      /**
       * The ResponseServiceInterface entity to use
       *
       * @var ResponseServiceInterface
       */
      protected ResponseServiceInterface $response_service;


      /**
       * The class constructor
       *
       * @param ResponseDataAbstract     $response_data    The ResponseDataAbstract object that holds the gateway API response
       * @param ResponseServiceInterface $response_service The ResponseServiceInterface entity to use
       */
      public function __construct ( ResponseDataAbstract $response_data,
                                    ResponseServiceInterface $response_service )
      {

         // Set the class data
         $this->response_data = $response_data;

         // Set the service entity
         $this->response_service = $response_service;
      }


      /**
       * Returns the name of the gateway that submitted the original request
       *
       * @return string
       */
      public function getGatewayName (): string
      {

         // Return the gateway name from the response
         return $this->response_data->getGatewayName();
      }


      /**
       * Returns the action performed in the original request (send, get etc.)
       *
       * @return string
       */
      public function getAction (): string
      {

         // Return the action
         return $this->response_data->getAction();
      }


      /**
       * Returns a true / false value based on a gateway API response
       *
       * @return bool
       */
      public function isSuccessful (): bool
      {

         // Use the service to check the status of the response
         return $this->response_service->isSuccessful( $this->response_data );
      }


      /**
       * Returns the reference ID from a gateway API response
       *
       * @return string
       */
      public function getReferenceID (): ?string
      {

         // Use the service to get the reference ID from the response
         return $this->response_service->getReferenceID( $this->response_data );
      }


      /**
       * Returns the status message from a gateway API response
       *
       * @return string
       */
      public function getMessage (): ?string
      {

         // Use the service to get the message from the response
         return $this->response_service->getMessage( $this->response_data );
      }


      /**
       * Returns the raw data from a gateway API response
       *
       * @return mixed
       */
      public function getData ()
      {

         // Use the service to get the raw data from the response
         return $this->response_service->getData( $this->response_data );
      }

   }