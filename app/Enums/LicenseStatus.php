<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class LicenseStatus extends Enum
{
    const ACTIVE = 'active';
    const EXPIRED = 'expired';
    const SUSPENDED = 'suspended';
}
