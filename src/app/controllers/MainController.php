<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\Db;

class MainController extends Controller {

    public $pageSize;

    public function indexAction() {
        if($this->checkRole('admin')) {
            $data = $this->getExchangeRate();
            $data = json_decode($data);
            $usdRate = $data->securities->data[13][3];
            $eurRate = $data->securities->data[3][3];
            $rates = array(
                'USD/RUB' => $usdRate,
                'EUR/RUB' => $eurRate,
            );
            $this->view->render('Главная', $rates);
        }else {
            $this->view->redirect('/login');   
        }
    }
    
    public function getExchangeRate() {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://iss.moex.com/iss/statistics/engines/futures/markets/indicativerates/securities.json');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $out = curl_exec($curl);
        curl_close($curl);
        return $out;
    }

}