<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Wishlists Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Products
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Wishlist get($primaryKey, $options = [])
 * @method \App\Model\Entity\Wishlist newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Wishlist[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Wishlist|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Wishlist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Wishlist[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Wishlist findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */class WishlistsTable extends Table
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

		$this->table('wishlists');
		$this->displayField('id');
		$this->primaryKey('id');

		$this->addBehavior('Timestamp');

		$this->belongsTo('Products', [
			'foreignKey' => 'product_id',
			'joinType' => 'INNER'
		]);
		$this->belongsTo('Users', [
			'foreignKey' => 'user_id',
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
		$validator->integer('id')->allowEmpty('id', 'create');
		
		// $validator
		// 	->notEmpty('note')
		// 	->add('note', [
		// 		'minLength' => [ // name of rule
		// 			'rule' => ['minLength', 8], 
		// 			'message' => 'notes must be at least 8 characters long.',
		// 		],
		// 		'maxLength' => [ // name of rule
		// 			'rule' => ['maxLength', 10], 
		// 			'message' => 'notes must be at more 10 characters long.',
		// 		]
		// ]);
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
		$rules->add($rules->existsIn(['product_id'], 'Products'));
		$rules->add($rules->existsIn(['user_id'], 'Users'));

		return $rules;
	}
}
