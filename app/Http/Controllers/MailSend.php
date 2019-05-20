<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OrderPricelist;
use Illuminate\Support\Facades\Mail;

class MailSend extends Controller
{
	//Прайс лист
    public function mailPriceList(Request $request) {
    	$data = $request->all();
    	return Mail::send('emails.mailPriceList', $data, function($message) {
			$message->to('info@l-green.ru', 'L-green')->subject('Новая заявка "Прайс лист"');
		});
    }
    //Прайс лист Модули
    public function mailPriceModule(Request $request) {
        $data = $request->all();
        return Mail::send('emails.mailPriceModule', $data, function($message) {
            $message->to('info@l-green.ru', 'L-green')->subject('Новая заявка "Прайс лист Модуль"');
        });
    }

	//Каталог
    public function mailCatalog(Request $request) {
    	$data = $request->all();
    	return Mail::send('emails.mailCatalog', $data, function($message) {
			$message->to('info@l-green.ru', 'L-green')->subject('Новая заявка "Каталог"');
		});
    }

	//Оставить заявку сверху в хедере
    public function mailHelper(Request $request) {
    	$data = $request->all();
    	return Mail::send('emails.mailHelper', $data, function($message) {
			$message->to('info@l-green.ru', 'L-green')->subject('Новая заявка "Оставить заявку"');
		});
    }

	//Связаться с нами в контактах
    public function mailContact(Request $request) {
    	$data = $request->all();
    	return Mail::send('emails.mailContact', $data, function($message) {
			$message->to('info@l-green.ru', 'L-green')->subject('Новая заявка "Связаться с нами"');
		});
    }
}
