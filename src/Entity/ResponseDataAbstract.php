<?php

   namespace Grayl\Gateway\Common\Entity;

   /**
    * Class ResponseDataAbstract
    * The abstract class of the entity for all API based gateway responses
    *
    * @package Grayl\Gateway\Common
    */
   abstract class ResponseDataAbstract implements ResponseDataInterface
   {

      /**
       * The response object returned from an API gateway request
       *
       * @var object
       */
      protected $api_response;

      /**
       * The name of the gateway
       *
       * @var string
       */
      protected string $gateway_name;

      /**
       * The action performed in the original request (send, get etc.)
       *
       * @var string
       */
      protected string $action;


      /**
       * Class constructor
       *
       * @param object $api_response The response object returned from an API gateway request
       * @param string $gateway_name The name of the gateway
       * @param string $action       The action performed in the original request (send, get etc.)
       */
      public function __construct ( $api_response,
                                    string $gateway_name,
                                    string $action )
      {

         // Set the class data
         $this->setAPIResponse( $api_response );
         $this->setGatewayName( $gateway_name );
         $this->setAction( $action );
      }


      /**
       * Sets the response object returned from an API gateway request
       *
       * @param object $api_response The response object returned from an API gateway request
       */
      public function setAPIResponse ( $api_response ): void
      {

         // Set the gateway API response object
         $this->api_response = $api_response;
      }


      /**
       * Returns the response object returned from an API gateway request
       *
       * @return object
       */
      public function getAPIResponse ()
      {

         // Return the gateway API response
         return $this->api_response;
      }


      /**
       * Sets the gateway name
       *
       * @param string $gateway_name The name of the gateway
       */
      public function setGatewayName ( string $gateway_name ): void
      {

         // Set the gateway name
         $this->gateway_name = $gateway_name;
      }


      /**
       * Returns the gateway name
       *
       * @return string
       */
      public function getGatewayName (): string
      {

         // Return the gateway name
         return $this->gateway_name;
      }


      /**
       * Sets the action of the original request
       *
       * @param string $action The action performed in the original request (send, etc.)
       */
      public function setAction ( string $action ): void
      {

         // Set the action
         $this->action = $action;
      }


      /**
       * Returns the action of the original request
       *
       * @return string
       */
      public function getAction (): string
      {

         // Return the action
         return $this->action;
      }

   }