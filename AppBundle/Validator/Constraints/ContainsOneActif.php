<?php

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ContainsOneActif extends Constraint
{

    public $message = 'Only one entry should be actif !';

    public function validatedBy()
    {
        return 'unique_actif';
    }

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
