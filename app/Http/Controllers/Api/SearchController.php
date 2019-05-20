<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pricelist;

class SearchController extends Controller
{
    public function search(Request $request) {
    	// Определим сообщение, которое будет отображаться, если ничего не найдено 
        // или поисковая строка пуста
        $error = ['error' => 'По вашему запросу ничего не найдено'];

        // Удостоверимся, что поисковая строка есть
        if($request->has('q')) {

            // Используем синтаксис Laravel Scout для поиска по таблице products.
            $posts = Pricelist::search($request->get('q'))->get();

            // Если есть результат есть, вернем его, если нет  - вернем сообщение об ошибке.
            return view('search')->with('posts', $posts);

        }

        // Вернем сообщение об ошибке, если нет поискового запроса
        return response()->json($error);
    }
}
