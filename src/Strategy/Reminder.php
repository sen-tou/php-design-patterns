<?php

namespace Stvbyr\PhpDesignPatterns\Strategy;

interface Reminder
{
    /**
     * @return Notification[]
     */
    public function getHandledNotifications(): array;
}
