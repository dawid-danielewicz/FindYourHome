<?php

namespace App\FindYourHome\Interfaces;

interface FrontendRepositoryInterface{
    public function getAdvertsForMainPage();
    public function getSingleAdvert($id);
    public function getUserAdverts($id);
    public function getUser($id);
    public function saveMessage($request);
}
