<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use App\Models\Product;
use Illuminate\Http\Request;

class NewProductScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Create Product';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Create Product')
                ->icon('plus')
                ->method('createProduct')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Input::make('product.name')
                    ->title('Product Name'),

                Input::make('product.price')
                    ->title('Product Price'),

                Input::make('product.provider')
                    ->title('Product Provider'),

                Input::make('product.description')
                    ->title('Product Description'),

                Input::make('product.url')
                    ->title('Product Image URL')
            ])
        ];
    }

    public function createProduct(Product $product, Request $request){
        $product->fill($request->get('product'))->save();

        return redirect()->route('platform.products.list');
    }
}
