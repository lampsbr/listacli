<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Passos Model
 *
 * @property \App\Model\Table\ModelosTable|\Cake\ORM\Association\BelongsTo $Modelos
 * @property \App\Model\Table\ConcluidosTable|\Cake\ORM\Association\HasMany $Concluidos
 *
 * @method \App\Model\Entity\Passo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Passo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Passo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Passo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Passo|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Passo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Passo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Passo findOrCreate($search, callable $callback = null, $options = [])
 */
class PassosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('passos');
        $this->setDisplayField('idpassos');
        $this->setPrimaryKey('idpassos');

        $this->belongsTo('Modelos', [
            'foreignKey' => 'modelo_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Concluidos', [
            'foreignKey' => 'passo_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('idpassos')
            ->allowEmpty('idpassos', 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 100)
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->integer('ordem')
            ->requirePresence('ordem', 'create')
            ->notEmpty('ordem');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['modelo_id'], 'Modelos'));

        return $rules;
    }
}
