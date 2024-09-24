<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PaymentMethod extends Enum
{
    const CREDIT_CARD = 'credit_card';
    const BANK_TRANSFER = 'bank_transfer';
    const PAYPAL = 'paypal';
}
