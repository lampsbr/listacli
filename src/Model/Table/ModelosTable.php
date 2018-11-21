<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Modelos Model
 *
 * @property \App\Model\Table\PassosTable|\Cake\ORM\Association\HasMany $Passos
 * @property \App\Model\Table\ProjetosTable|\Cake\ORM\Association\HasMany $Projetos
 *
 * @method \App\Model\Entity\Modelo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Modelo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Modelo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Modelo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Modelo|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Modelo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Modelo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Modelo findOrCreate($search, callable $callback = null, $options = [])
 */
class ModelosTable extends Table
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

        $this->setTable('modelos');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->hasMany('Passos', [
            'foreignKey' => 'modelo_id'
        ]);
        $this->hasMany('Projetos', [
            'foreignKey' => 'modelo_id'
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
            ->scalar('nome')
            ->maxLength('nome', 100)
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        return $validator;
    }
}
