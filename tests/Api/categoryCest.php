<?php

namespace Tests\API;
use Tests\Support\ApiTester;

class categoryCest
{
    public function getCategories(ApiTester $I)
	{
		// 1 проверка - нет корзин
		$I->sendGet('/category/list');
		$category = $I->grabResponse();
		$category = json_decode($category ,true);
		$I->seeResponseCodeIs(200);
		$I->seeResponseJsonMatchesJsonPath('$.errors');
		//echo "<pre>".htmlentities(print_r($category, true))."</pre>";exit();
	}
}