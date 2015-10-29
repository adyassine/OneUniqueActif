<?php

namespace AppBundle\Entity;

use AppBundle\Validator\Constraints\ContainsOneActif;

/**
 * @ORM\Entity()
 * @ContainsOneActif
 */
class MyEntity
{
    // your code here
}
