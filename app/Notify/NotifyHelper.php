<?php

namespace App\Notify;

use Flasher\Notyf\Prime\NotyfBuilder;
use Flasher\Notyf\Prime\NotyfFactory;

trait NotifyHelper
{
    private function notify()
    {
        return notyf()
            ->position("x", "left")
            ->position("y", "top");
    }

    public function successNotify(string $msg): void
    {
        $this->notify()->addSuccess($msg);
    }

    public function errorNotify(string $msg): void
    {
        $this->notify()->addError($msg);
    }

    public function warningNotify(string $msg): void
    {
        $this->notify()->addWarning($msg);
    }

    public function notyf(): NotyfBuilder
    {
        return $this->notify();
    }

}
