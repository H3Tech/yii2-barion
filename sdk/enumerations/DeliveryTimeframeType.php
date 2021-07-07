<?php

namespace h3tech\barion\sdk\enumerations;

abstract class DeliveryTimeframeType
{
    const ElectronicDelivery = "ElectronicDelivery";
    const SameDayShipping = "SameDayShipping";
    const OvernightShipping = "OvernightShipping";
    const TwoDayOrMoreShipping = "TwoDayOrMoreShipping";
}