<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projetos Model
 *
 * @property \App\Model\Table\ModelosTable|\Cake\ORM\Association\BelongsTo $Modelos
 * @property \App\Model\Table\ClientesTable|\Cake\ORM\Association\BelongsTo $Clientes
 * @property \App\Model\Table\ConcluidosTable|\Cake\ORM\Association\HasMany $Concluidos
 *
 * @method \App\Model\Entity\Projeto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Projeto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Projeto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Projeto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Projeto|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Projeto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Projeto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Projeto findOrCreate($search, callable $callback = null, $options = [])
 */
class ProjetosTable extends Table
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

        $this->setTable('projetos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Modelos', [
            'foreignKey' => 'modelo_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Clientes', [
            'foreignKey' => 'cliente_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Concluidos', [
            'foreignKey' => 'projeto_id'
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
            ->scalar('observacao')
            ->maxLength('observacao', 45)
            ->allowEmpty('observacao');

        $validator
            ->boolean('arquivado')
            ->requirePresence('arquivado', 'create')
            ->notEmpty('arquivado');

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
        $rules->add($rules->existsIn(['cliente_id'], 'Clientes'));

        return $rules;
    }
}
