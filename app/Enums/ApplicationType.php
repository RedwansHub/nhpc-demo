<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ApplicationType extends Enum
{
    const NEW_LICENSE = 'new_license';
    const RENEWAL = 'renewal';
    const UPGRADE = 'upgrade';
}
