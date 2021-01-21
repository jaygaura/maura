<?php

namespace App\Helpers;

class Man extends Mouth
{

    public $name, $isDoctor;

    public function __construct($name, $isDoctor = false)
    {
        $this->name     = $name;
        $this->isDoctor = $isDoctor;

    }

    private function open()
    {
        return '&ndash;I, ' . $this->name . ', am opening my mouth.';
    }

    private function close()
    {
        return '&ndash;I, ' . $this->name . ', am closing my mouth.';
    }

    public function askedTo(Man $WhoIsAsking, $action = 'open')
    {
        if ($WhoIsAsking->isDoctor) {
            return $this->$action();
        } else {
            return '&ndash;Take a hike!';
        }
    }

    public function askingTo(Man $WhoIsAsBeingAsked, $action = 'open')
    {
        return $WhoIsAsBeingAsked->askedTo($this, $action);
    }

}
