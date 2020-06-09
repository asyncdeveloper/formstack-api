<?php


namespace App\Handlers;


use Pecee\Http\Request;
use Pecee\SimpleRouter\Handlers\IExceptionHandler;

class CustomExceptionHandler implements IExceptionHandler
{

    /**
     * @param Request $request
     * @param \Exception $error
     * @throws \Exception
     */
    public function handleError(Request $request, \Exception $error) : void
    {

         response()
           ->httpCode($error->getCode())
          ->json([ 'message' => $error->getMessage() ]);
    }

}