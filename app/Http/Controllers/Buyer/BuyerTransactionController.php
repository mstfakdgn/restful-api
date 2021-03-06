<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\ApiController;
use App\Models\Buyer;

class BuyerTransactionController extends ApiController
{
    public function __construct()
    {
        // parent::__construct();
        $this->middleware('can:view,buyer')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        $transactions = $buyer->transaction;

        return $this->showAll($transactions);
    }
}
