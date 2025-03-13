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
use App\Enums\Status;
use MoonShine\Fields\Select;

class OrdersResource extends Resource
{
	public static string $model = Orders::class;

	public static string $title = 'Orders';

	public function fields(): array
	{
		return [
		    ID::make()->sortable(),
            Text::make('e-mail'),
            Number::make('итоговаая цена','total_price'),
            Text::make('телефон','phone'),
            Text::make('адресс','address'),
            // Enum::make('статус','status_id')->attach(Status::class),//если писать status то выдаст исключение , а status_id писать не получистя так как не ттакого поля
            Select::make('статус','status')->options(['accepted'=>'accepted','
                in_proccess'=>'in_proccess',
                'cancelled'=>'cancelled']),
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
