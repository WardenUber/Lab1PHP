<?php
namespace Classes;


use AllowDynamicProperties;

#[AllowDynamicProperties] class Comment{

    function __construct(User $user, string $text){
        $this->user = $user;
        $this->text = $text;

    }
    public function getUserDate(): string
    {
        return $this->user->getDateCreate();
    }

}

