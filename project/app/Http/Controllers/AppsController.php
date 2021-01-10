<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Telegram;
class AppsController extends BaseController
{
	public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function toTelegram($notifiable)
    {
        
    }

    public function index(){
    	$response = Telegram::getMe();

$botId = $response->getId();
$firstName = $response->getFirstName();
$username = $response->getUsername();
// dd(url('assets/Tulips.jpg'));

$aku = Telegram::getUpdates();
dd($aku);
$send = Telegram::sendMessage([
	'chat_id' => 1477800567,
	'text'=>"pesan"]);

	Telegram::setAsyncRequest(true)
          ->sendPhoto(['chat_id' => 1477800567, 'photo' =>'Tulips.jpg']);

           dd($botId, $firstName, $username);
    }

    
}
