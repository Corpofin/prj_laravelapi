<?php
//<project>/app/Http/Controllers/Transaction/TransactionController.php
namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oCollection = Transaction::all();
        return $this->showAll($oCollection);
    }//index

    /**
     * Display the specified resource.
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return $this->showOne($transaction);
    }//show
}//TransactionController
