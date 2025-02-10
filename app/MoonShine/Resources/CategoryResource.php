<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\Image;
use MoonShine\Fields\Enum;
use MoonShine\Fields\Number;
use MoonShine\Fields\Select; 
use MoonShine\Actions\FiltersAction;

class CategoryResource extends Resource
{
	public static string $model = Category::class;

	public static string $title = 'Categories';

	public function fields(): array
	{
		return [
		    ID::make()->sortable(),
            Text::make('title')->translatable()->sortable(),
            Text::make('slug'),
            Text::make('описание','description'),
            Number::make('сортировка','sort')->sortable(),
            Number::make('родитель','parent_id'),
            Image::make('image', 'image_path')
                ->dir('/') // Директория где будут хранится файлы в storage (по умолчанию /)
                ->disk('public') // Filesystems disk
                ->allowedExtensions(['jpg', 'gif', 'png']) // Допустимые расширения
        ];
	}

	public function rules(Model $item): array
	{
	    return [
            'title'=>['required', 'string', 'min:3', 'max:50'],
            'slug'=>['required', 'string', 'min:3', 'max:50'],
            'description'=>['required', 'string', 'max:500'],
            'sort'=>['nullable','numeric'],
            'parent_id'=>['nullable','numeric'],
            'image_path'=>['required', 'image'],
       //     'supplier_id'=>['required', 'numeric'],

        ];
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
