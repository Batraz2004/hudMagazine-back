<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;

use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;
use MoonShine\Fields\Text;
use MoonShine\Fields\Number;
use MoonShine\Fields\Enum;

class OrdersResource extends Resource
{
	public static string $model = Orders::class;

	public static string $title = 'Orders';

	public function fields(): array
	{
		return [
		    ID::make()->sortable(),
            Text::make('e-mail'),
            Number::make('total_price'),
            Text::make('phone'),
            Text::make('address'),
            //Enum::make('status')->attach(StatusEnum::class),
        ];
	}
    // protected function formFields(): iterable
    // {
    //     return [
    //         Box::make([
    //             ID::make(),
    //             Text::make('phone'),
    //             Text::make('address'),
    //         ]),

    //     ];

    // }
	public function rules(Model $item): array
	{
	    return [];
    }

    public function search(): array
    {
        return ['id'];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
