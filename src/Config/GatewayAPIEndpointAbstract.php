<?php

   namespace Grayl\Gateway\Common\Config;

   /**
    * Class GatewayAPIEndpointAbstract
    * The abstract class of a single API endpoint
    *
    * @package Grayl\Gateway\Common
    */
   abstract class GatewayAPIEndpointAbstract
   {

      /**
       * The ID of this API endpoint (default, provision, etc.)
       *
       * @var string
       */
      protected string $api_endpoint_id;


      /**
       * Class constructor
       *
       * @param string $api_endpoint_id The ID of this API endpoint (default, provision, etc.)
       */
      public function __construct ( string $api_endpoint_id )
      {

         // Set the class data
         $this->setAPIEndpointID( $api_endpoint_id );
      }


      /**
       * Gets the API endpoint ID
       *
       * @return string
       */
      public function getAPIEndpointID (): string
      {

         // Return it
         return $this->api_endpoint_id;
      }


      /**
       * Set the API endpoint ID
       *
       * @param string $api_endpoint_id The ID of this API endpoint (default, provision, etc.)
       */
      public function setAPIEndpointID ( string $api_endpoint_id ): void
      {

         // Set the API endpoint ID
         $this->api_endpoint_id = $api_endpoint_id;
      }

   }