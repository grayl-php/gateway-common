<?php

   namespace Grayl\Gateway\Common\Service;

   use Grayl\Gateway\Common\Entity\ResponseDataAbstract;

   /**
    * Interface ResponseServiceInterface
    * This interface describes the service for all API based gateway responses
    *
    * @package Grayl\Gateway\Common
    */
   interface ResponseServiceInterface
   {

      /**
       * Returns a true / false value based on a gateway API response
       *
       * @param ResponseDataAbstract|object $response_data The response data object to check
       *
       * @return bool
       */
      public function isSuccessful ( object $response_data ): bool;


      /**
       * Returns the reference ID from a gateway API response
       *
       * @param ResponseDataAbstract|object $response_data The response data object to pull the reference ID from
       *
       * @return string
       */
      public function getReferenceID ( object $response_data ): ?string;


      /**
       * Returns the status message from a gateway API response
       *
       * @param ResponseDataAbstract|object $response_data The response data object to get the message from
       *
       * @return string
       */
      public function getMessage ( object $response_data ): ?string;


      /**
       * Returns the raw data from a gateway API response
       *
       * @param ResponseDataAbstract|object $response_data The response data object to pull the data from
       *
       * @return mixed
       */
      public function getData ( object $response_data );

   }