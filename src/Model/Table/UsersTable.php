<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Groups
 * @property \Cake\ORM\Association\HasMany $Cashflows
 * @property \Cake\ORM\Association\HasMany $Invoices
 * @property \Cake\ORM\Association\HasMany $Logs
 * @property \Cake\ORM\Association\HasMany $Stocks
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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
        $this->addBehavior('Acl.Acl', ['type' => 'requester']);
        
        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Cashflows', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Invoices', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Logs', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Stocks', [
            'foreignKey' => 'user_id'
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
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->allowEmpty('avatars');

        $validator
            ->notEmpty('fullname')
            ->add('fullname', [
                'minLength' => [ // name of rule
                    'rule' => ['minLength', 8], 
                    'message' => 'notes must be at least 8 characters long.',
                ],
                'maxLength' => [ // name of rule
                    'rule' => ['maxLength', 10], 
                    'message' => 'notes must be at more 10 characters long.',
                ]
        ]);

        $validator
            ->allowEmpty('thumbnail');

        // $validator
        //     ->notEmpty('fullname');

        $validator
            ->email('email')
            ->notEmpty('email');

        $validator
            ->allowEmpty('address');

        $validator
            ->allowEmpty('tel');

        // $validator
        //     ->date('date_of_birth')
        //     ->allowEmpty('date_of_birth');

        $validator
            ->boolean('actived')
            ->allowEmpty('actived');

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
        $rules->add($rules->isUnique(['username']));
        // $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['group_id'], 'Groups'));

        return $rules;
    }

    // public function getUsersInfomation() {
        // $this->Users->getUsersInfomation();
        // #1
        // $sql = "SELECT * FROM `users` WHERE `id` = 2";
        // return $this->connection()->execute($sql)->fetchAll('assoc');
        // #2
        // $Aco  = TableRegistry::get('Acos');
        // $acos = $Aco->find('threaded')->contain(['Aros'])->select(['id','parent_id','alias'])->where(['actived' => true]);
    // }

    // public function getUsersByLocation($location)
    // {
    //     $sql = "SELECT `user_id`, `username` FROM `user` WHERE `location` = ?";
    //     return $this->connection()->execute($sql, [$location])->fetchAll('assoc');
    // }
}
