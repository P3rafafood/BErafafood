<?php

namespace App\Enums;

enum TransactionPaymentEnum:string {
    case Cash='cash';
    case Debit='debit';
}
