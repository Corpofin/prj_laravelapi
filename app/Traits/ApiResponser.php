<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

trait ApiResponser
{
    function successReponse($data,$code=200)
    {
        return response()->json($data, $code);
    }//successResponse

    /**
     * 
     * @param mixed $message String|Array
     * @param integer $code
     * @return String 
     */
    function errorResponse($message, $code)
    {
        return response()->json(["error"=>["message"=>$message,"code"=>$code]],$code);
    }//errorResponse

    function showAll(Collection $collection,$code=200)
    {
        $arData = ["data"=>$collection];
        return $this->successReponse($arData,$code);
    }//showAll

    function showOne(Model $instance, $code=200)
    {
        $arData = ["data"=>$instance];
        return $this->successReponse($arData,$code);
    }//showOne

    function showMessage(String $message, $code=200)
    {
        return $this->successReponse($message,$code);
    }//showMessage    

}//trait ApiResponser