<?php

namespace App\Commands;

class CreateCompanyCommand {

    public function __construct($userId, $name, $logo) {
        $this->userId = $userId;
        $this->name = $name;
        $this->logo = $logo;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getLogo()
    {
        return $this->logo;
    }
}