<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $client_number
 * @property string $contact_number
 * @property string $email
 * @property string $contact_person
 * @property \Cake\I18n\FrozenTime $acount_created
 *
 * @property \App\Model\Entity\Session[] $sessions
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Participant[] $participants
 */
class Client extends Entity
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
        '*' => true,
        'id' => false
    ];
}
