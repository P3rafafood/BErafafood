<?php

namespace App\Enums;

enum TransactionStatusEnum:string {
    case Waiting='waiting';
    case Proses='proses';
    case Payment='payment';
    case Finish='finish';
}
