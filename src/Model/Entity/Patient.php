<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Patient Entity
 *
 * @property int $id
 * @property string $name
 * @property int $age
 * @property string $email
 * @property int $phone
 * @property string $address
 * @property \Cake\I18n\FrozenTime $created_date
 *
 * @property \App\Model\Entity\Appoint[] $appoints
 */
class Patient extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'age' => true,
        'email' => true,
        'phone' => true,
        'address' => true,
        'created_date' => true,
        'appoints' => true,
    ];
}
