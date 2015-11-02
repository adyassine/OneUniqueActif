<?php

namespace AppBundle\Validator\Constraints;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * @Annotation
 */
class ContainsOneActifValidator extends ConstraintValidator
{

    private $entityManager;
    private $class;
    private $field;

    public function __construct(EntityManager $entityManager, $class , $field)
    {
        $this->entityManager = $entityManager;
        $this->class = $class;
        $this->field = $field;
    }

    public function validate($object, Constraint $constraint)
    {
       $result = $this->entityManager->getRepository($this->class)
                ->findOneBy(array(
                    $this->field => true,
                ));

        if ($result != null && $object->getIsActif() && $result->getId() != $object->getId()) {
            $this->context->addViolationAt($this->field, $constraint->message);
            return false;
        }
        return true;
    }

}
