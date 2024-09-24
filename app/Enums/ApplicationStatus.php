<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;


final class ApplicationStatus extends Enum
{
    const SUBMITTED = 'submitted';
    const UNDER_REVIEW = 'under_review';
    const APPROVED = 'approved';
    const REJECTED = 'rejected';
}
