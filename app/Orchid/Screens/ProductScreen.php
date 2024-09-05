<?php

namespace App\Orchid\Screens;

use App\Models\Product;
use Orchid\Support\Facades\Layout;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;

class ProductScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $products = $products = Product::latest()->filter(request()->all())->get();
        return [
            'products' => $products
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'ProductScreen';
    }

    /**
     * The screen's action buttons.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make("Create New")
                ->icon('plus')
                ->route('platform.product.create')
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
            Layout::table('products', [
                TD::make('name', 'Product Name')->render(function (Product $product) {
                    return $product->name;
                }),
                TD::make('price', 'Price')->render(function (Product $product) {
                    return $product->price;
                }),
                TD::make('provider', 'Provider')->render(function (Product $product) {
                    return $product->provider;
                }),
                TD::make('description', 'Description')->render(function (Product $product) {
                    return '<div style="white-space: normal;">' . $product->description . '</div>';
                }),
                TD::make('actions', 'Actions')->render(function (Product $product) {
                    return Link::make()->icon('pencil')->route('platform.product.edit', $product);
                }),

                TD::make('delete', '')->render(function (Product $product) {
                    return Button::make('Delete')
                        ->icon('trash')
                        ->confirm('Are you sure you want to delete this product?')
                        ->method('deleteProduct', [
                            'id' => $product->id,
                        ]);
                }),
            ])
        ];
    }

    public function deleteProduct(Request $request)
    {
        Product::findOrFail($request->get('id'))->delete();

        return redirect()->route('platform.products.list');
    }
}
