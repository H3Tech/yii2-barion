<?php

namespace h3tech\barion\sdk\enumerations;

abstract class PaymentType
{
    const Immediate = "Immediate";
    const Reservation = "Reservation";
    const DelayedCapture = "DelayedCapture";
}