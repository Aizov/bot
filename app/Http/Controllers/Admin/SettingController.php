<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
class SettingController extends Controller
{
    public function index(){
        return view('admin.settings', Setting::getSettings());
    }
    public function store(Request $request){
        Setting::where('key', '!=', NULL)->delete();
        foreach ($request->except('_token') as $key => $value){
            $setting = new Setting;
            $setting->key = $key;
            $setting->value = $request->$key;
            $setting->save();
        }
        return redirect('admin.index');
    }
    public function setWebHook(Request $request){
        $result = $this->sendTelegramData('setwebhook', [
            'query' => ['url' => $request->url().'/'.\Telegram::getAccessToken()]
            ]);
        return redirect()->route('admin.setting')->with('status', $result);
    }
    public function getWebHookInfo(Request $request){
        $result = $this->sendTelegramData('getWebHookInfo');
        return redirect()->route('admin.setting.index')->with('status', $result);
    }
    public function sendTelegramData($route = '', $params = [], $method = 'POST'){
        $client = new \GuzzleHttp\Client(['base_uri' => 'https://api.telegram.org/bot' . \Telegram::getAccessToken() . '/']);
        $result = $client->request( $method, $route, $params);
        return (string) $result->getBody();
    }
}
