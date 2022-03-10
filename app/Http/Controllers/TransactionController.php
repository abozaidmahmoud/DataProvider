<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransactionsCollection;
use App\Responders\ListTransactionsResponder;
use App\Services\ListTransactionsService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * @param Request $request
     * @param ListTransactionsService $service
     * @param ListTransactionsResponder $responder
     * @return TransactionsCollection
     */
    public function transactaions(Request $request, ListTransactionsService $service, ListTransactionsResponder $responder) :TransactionsCollection
    {
        return $responder->setResponse($service->handle($this->validateRequest($request)))->respond();
    }

    /**
     * @param $request
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    private function validateRequest($request)
    {
//        if (!$request->has('statusCode')) request()->merge(['statusCode' => 'paid']);
        return  $this->validate($request, [
            'provider' => 'sometimes|nullable|string|min:1|max:256',
            'statusCode' => "sometimes|nullable|string|min:1|max:255|in:paid,pending,reject",
            'amountMin' => 'sometimes|nullable|numeric|min:1',
            'amountMax' => 'sometimes|nullable|numeric',
            'currency' => 'sometimes|nullable|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|string|min:1|max:10',
        ]);
    }


}
