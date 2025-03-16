<?php

declare(strict_types=1);


namespace Test\Api;

use Test\Support\ApiTester;

final class CartCest
{
    private $goodsId;
    private $quantity;
    private $succesToken;
    
    public function _before(ApiTester $I): void
    {
        // Code here will be executed before each test.

        //добавляемый товар и его кол-во
        $this->goodsId = 22;
        $this->quantity = 1;

        //авторизация
        $I->sendPost('/user/auth',[
            'email' => 'postavchikTEST2@mail.ru',
            'password' => 'passwd123', 
        ]);

        $result = $I->grabResponse();
        $result = json_decode($result,true)['succes_token'];

        $this->succesToken = $result;
    }

    public function tryToTest(ApiTester $I): void
    {
        // Write your tests here. All `public` methods will be executed as tests.
    }

    public function addProductToCart(ApiTester $I)
    {

        $I->haveHttpHeader('Authorization','Bearer '.$this->succesToken);
        // $I->haveHttpHeader('amBearerAuthenticated', $this->succesToken);
        $I->sendPost('/cart/add',[
            'id' => $this->goodsId,
            'quantity' => $this->quantity,
        ]);

        $result = $I->grabResponse();
        $result = json_decode($result, true);

        echo '<pre>'.htmlentities(print_r($result, true)).'</pre>';;
        // $I->amBearerAuthenticated($token);
        // $I->assertEquals($cartArr['data'][0]['items'][0]['active'], 1);
		// $I->assertEquals($cartArr['data'][0]['currentOrderAmount'], 1200);
    }

    // public function getCart()
    // {

    // }

    // public function clearCart()
    // {

    // }
}
