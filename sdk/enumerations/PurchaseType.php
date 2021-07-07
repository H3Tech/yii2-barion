<?php

namespace h3tech\barion\sdk\enumerations;

abstract class PurchaseType
{
    const GoodsAndServicePurchase = "GoodsAndServicePurchase";
    const CheckAcceptance = "CheckAcceptance";
    const AccountFunding = "AccountFunding";
    const QuasiCashTransaction = "QuasiCashTransaction";
    const PrePaidVacationAndLoan = "PrePaidVacationAndLoan";
}