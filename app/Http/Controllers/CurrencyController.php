<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency;


class CurrencyController extends Controller
{
    public function index()
    {

        $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
        $page =  isset($_GET['page']) ? $_GET['page'] : 1;

        $currencies = Currency::latest()->get();

        return array(
            "currencies" => $currencies->slice($limit * ($page - 1), $limit)->all(),
            "total" => count($currencies)
        );

    }
}
