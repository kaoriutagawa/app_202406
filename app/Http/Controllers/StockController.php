<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;


class StockController extends Controller
{
    private $stock;

    public function __construct(Stock $stock)
    {
        $this->stock = $stock;
    }
    
    public function index()
    {

        $stock = $this->stock->get();

        $suppliers = [
            'a' => 'company A',
            'b' => 'company B',
            'c' => 'company C',
            'Local Farmer' => 'Local Farmer',
        ];

        return view('stocks.index')
        ->with('suppliers', $suppliers)
        ->with('stock', $stock);

    }

    public function store(Request $request)
    {
        $request->validate([
            'product_code' => 'required|max:13',
            'name_of_product' => 'required',
            'quantity' => 'required|min:1',
            'price' => 'required|min:1',
            'name_of_supplier' => 'required|min:1'

        ]);

        $this->stock->product_code = $request->product_code;
        $this->stock->name_of_product = $request->name_of_product;
        $this->stock->quantity = $request->quantity;
        $this->stock->price = $request->price;
        $this->stock->name_of_supplier = $request->name_of_supplier;
        

        $this->stock->save();

        return redirect()->back(); 

    }

    public function edit($id)
    {
        $stock = $this->stock->findOrFail($id);

        $suppliers = [
            'a' => 'company A',
            'b' => 'company B',
            'c' => 'company C',
            'Local Farmer' => 'Local Farmer',
        ];

        return view('stocks.edit')
        ->with('stock',$stock)
        ->with('suppliers', $suppliers);

    }

    public function destroy($id)
    {
       $this->stock->destroy($id);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $stock = $this->stock->findOrFail($id);
        $stock->product_code = $request->product_code;
        $stock->name_of_product = $request->name_of_product;
        $stock->quantity = $request->quantity;
        $stock->price = $request->price;
        $stock->name_of_supplier = $request->name_of_supplier;
        $stock->save();

        return redirect()->route('index'); 
    }

    public function show()
    {        
        $stocks = $this->stock->get();

        return view('stocks.show')->with('stocks',$stocks); 

    }

    public function buy($id)
    {
        $stock = $this->stock->findOrFail($id);

        return view('stocks.cart')->with('stock', $stock);
    }
    
    public function purchase(Request $request, $id)
    {

        $stock = $this->stock->findOrFail($id);
        
        $request->validate([
            'buy' => 'required|numeric|min:1|max:' . $stock->quantity,
        ]);

        $stock->quantity = ($stock->quantity - $request->buy);
        $stock->save();

        return redirect()->route('stock.show');

    }


    public function payment(Request $request)
    {
        $stocks = $this->stock->all(); // すべてのレコードを取得する
    
        if ($stocks->isEmpty()) {
            return view('stocks.payment')
                ->with('stocks', $stocks)
                ->with('total_price', 0);
        }
    
        $total_price = 0;
    
        foreach ($stocks as $stock) {
            $total_price += $stock->quantity * $stock->price;
        }
    
        return view('stocks.payment')
            ->with('stocks', $stocks)
            ->with('total_price', $total_price);
    }
    

}
