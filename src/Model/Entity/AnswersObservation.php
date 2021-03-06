<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AnswersObservation Entity
 *
 * @property int $observation_id
 * @property int $answer_id
 *
 * @property \App\Model\Entity\Observation $observation
 * @property \App\Model\Entity\Answer $answer
 */
class AnswersObservation extends Entity
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
        'observation_id' => false,
        'answer_id' => false
    ];
}
