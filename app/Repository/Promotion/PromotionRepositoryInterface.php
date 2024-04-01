<?php

namespace App\Repository\Promotion;

interface PromotionRepositoryInterface{


    public function index();
    public function store($request);
    public function getPromotion();
    public function deleteAll($request);
    

}