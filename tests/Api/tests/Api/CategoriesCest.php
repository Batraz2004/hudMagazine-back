<?php

declare(strict_types=1);


namespace Test\Api;

use Test\Support\ApiTester;

final class CategoriesCest
{
    public function _before(ApiTester $I): void
    {
        // Code here will be executed before each test.
    }

    public function tryToTest(ApiTester $I): void
    {
        // Write your tests here. All `public` methods will be executed as tests.
    }

    public function getCategories(ApiTester $I)
	{
		// 1 проверка - нет корзин
		$I->sendGet('/category/list');
		$categories = $I->grabResponse();
		$categories = json_decode($categories ,true);
        //echo '<pre>'.htmlentities(print_r($categories->toArray(), true)).'</pre>';;
		$I->seeResponseCodeIs(200);
		$I->seeResponseJsonMatchesJsonPath('$.errors');
	}
}
