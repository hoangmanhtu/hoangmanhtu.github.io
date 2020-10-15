<?php
require_once 'Mvc/frontend/models/Producer.php';
class ProducerController extends Controller
{
    public function index()
    {
        $producer_model = new Producer();
        $producers = $producer_model->getAllProducer();
        $this->content = $this->render('Mvc/frontend/views/producers/index.php', ['producers' => $producers
        ]);
        echo $this->content;
    }
}
