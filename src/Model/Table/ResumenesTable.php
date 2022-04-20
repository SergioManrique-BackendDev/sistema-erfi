<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Resumenes Model
 *
 * @method \App\Model\Entity\Resumene newEmptyEntity()
 * @method \App\Model\Entity\Resumene newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Resumene[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Resumene get($primaryKey, $options = [])
 * @method \App\Model\Entity\Resumene findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Resumene patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Resumene[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Resumene|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Resumene saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Resumene[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Resumene[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Resumene[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Resumene[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ResumenesTable extends Table
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

        $this->setTable('resumenes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date');

        $validator
            ->integer('gastos_productos')
            ->requirePresence('gastos_productos', 'create')
            ->notEmptyString('gastos_productos');

        $validator
            ->integer('ganancia_bruta')
            ->requirePresence('ganancia_bruta', 'create')
            ->notEmptyString('ganancia_bruta');

        $validator
            ->integer('deuda')
            ->requirePresence('deuda', 'create')
            ->notEmptyString('deuda');

        $validator
            ->integer('producto')
            ->requirePresence('producto', 'create')
            ->notEmptyString('producto');

        $validator
            ->integer('ganancia_actual')
            ->requirePresence('ganancia_actual', 'create')
            ->notEmptyString('ganancia_actual');

        $validator
            ->integer('cantidad_bolsa')
            ->requirePresence('cantidad_bolsa', 'create')
            ->notEmptyString('cantidad_bolsa');

        $validator
            ->integer('ganancia_final')
            ->requirePresence('ganancia_final', 'create')
            ->notEmptyString('ganancia_final');

        return $validator;
    }
}
