<?php

namespace Stvbyr\PhpDesignPatterns\Memento;

use DateTimeInterface;

class Booking
{
    public function __construct(private int $number, private DateTimeInterface $date)
    {
    }

    public function restore(BookingState $bookingState)
    {
        $this->number = $bookingState->getNumber();
        $this->date = $bookingState->getDate();
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
