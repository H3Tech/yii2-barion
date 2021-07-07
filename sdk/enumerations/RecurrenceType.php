<?php

namespace h3tech\barion\sdk\enumerations;

abstract class RecurrenceType
{
    const MerchantInitiatedPayment = "MerchantInitiatedPayment";
    const OneClickPayment = "OneClickPayment";
    const RecurringPayment = "RecurringPayment";
}