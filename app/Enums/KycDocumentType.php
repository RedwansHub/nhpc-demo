<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;


final class KycDocumentType extends Enum
{
    const PASSPORT = 'passport';
    const NATIONAL_ID = 'national_id';
    const DRIVER_LICENSE = 'driver_license';
    const HEALTH_INSURANCE_CARD = 'health_insurance_card';
    const UTILITY_BILL = 'utility_bill';
}
