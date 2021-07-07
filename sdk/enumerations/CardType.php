<?php

namespace h3tech\barion\sdk\enumerations;

abstract class CardType
{
    const Unknown = "Unknown";
    const Mastercard = "Mastercard";
    const Maestro = "Maestro";
    const Visa = "Visa";
    const Electron = "Electron";
    const AmericanExpress = "AmericanExpress";
}