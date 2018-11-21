<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Concluidos Model
 *
 * @property \App\Model\Table\ProjetosTable|\Cake\ORM\Association\BelongsTo $Projetos
 * @property \App\Model\Table\PassosTable|\Cake\ORM\Association\BelongsTo $Passos
 *
 * @method \App\Model\Entity\Concluido get($primaryKey, $options = [])
 * @method \App\Model\Entity\Concluido newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Concluido[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Concluido|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Concluido|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Concluido patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Concluido[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Concluido findOrCreate($search, callable $callback = null, $options = [])
 */
class ConcluidosTable extends Table
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

        $this->setTable('concluidos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Projetos', [
            'foreignKey' => 'projeto_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Passos', [
            'foreignKey' => 'passo_id',
            'joinType' => 'INNER'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('data')
            ->maxLength('data', 45)
            ->allowEmpty('data');

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
        $rules->add($rules->existsIn(['projeto_id'], 'Projetos'));
        $rules->add($rules->existsIn(['passo_id'], 'Passos'));

        return $rules;
    }
}
