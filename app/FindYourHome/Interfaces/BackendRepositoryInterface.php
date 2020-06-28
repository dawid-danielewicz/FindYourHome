<?php

namespace App\FindYourHome\Interfaces;

interface BackendRepositoryInterface{
    public function getUserAdverts();
    public function getUserMessages();
    public function getCities();
    public function getUser();
    public function addCity($request);
}
