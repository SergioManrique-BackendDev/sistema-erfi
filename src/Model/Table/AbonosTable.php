<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Abonos Model
 *
 * @method \App\Model\Entity\Abono newEmptyEntity()
 * @method \App\Model\Entity\Abono newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Abono[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Abono get($primaryKey, $options = [])
 * @method \App\Model\Entity\Abono findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Abono patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Abono[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Abono|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Abono saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Abono[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Abono[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Abono[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Abono[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AbonosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('abonos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');        
        
        $this->belongsTo('Personas', [
            'propertyName' => 'Persona',
            'foreignKey' => 'persona'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('persona')
            ->requirePresence('persona', 'create')
            ->notEmptyString('persona');

        $validator
            ->integer('cantidad')
            ->requirePresence('cantidad', 'create')
            ->notEmptyString('cantidad');

        $validator
            ->date('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmptyDate('fecha');

        return $validator;
    }
}
