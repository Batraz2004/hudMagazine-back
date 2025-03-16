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
        //проверка токена пользователя:
        $I->haveHttpHeader('Authorization','Bearer '.$this->succesToken);
        // $I->amBearerAuthenticated($this->succesToken);
        $I->sendPost('/cart/add',[
            'id' => $this->goodsId,
            'quantity' => $this->quantity,
        ]);

        $result = $I->grabResponse();
        $result = json_decode($result, true);

        // $I->comment('Полученный ответ:');
        echo '<pre>'.htmlentities(print_r(['запрос сделан успешно',$result], true)).'</pre>';;
        $I->seeResponseCodeIs(200);

        //проверка токена пользователя:
        $I->haveHttpHeader('Authorization','Bearer '.$this->succesToken);
        //запрос на получение :
        $I->sendGet('/cart/get');
        $result = $I->grabResponse();
        $result = json_decode($result, true)['data']['cart_items'];
        echo '<pre>'.htmlentities(print_r(['запрос сделан успешно',$result], true)).'</pre>';;
        $I->seeResponseCodeIs(200);
        // $I->assertEquals($cartArr['data'][0], 1);
    }

    // public function getCart(ApiTester $I)
    // {
    //     //проверка токена пользователя:
    //     $I->haveHttpHeader('Authorization','Bearer '.$this->succesToken);
    //     //запрос на получение :
    //     $I->sendGet('/cart/get');
    //     $result = $I->grabResponse();
    //     $result = json_decode($result, true)['data']['cart_items'];
    //     echo '<pre>'.htmlentities(print_r(['запрос сделан успешно',$result], true)).'</pre>';;
    //     $I->seeResponseCodeIs(200);
    // }

    // public function clearCart()
    // {

    // }
}
