<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 * @property User $User
 */
class Post extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	
    var $validate = array(
        'title'  => array(
            'rule' => 'notEmpty',
            'message' => 'Please fill in the required field.'
        ),
        'summary'   => 'notEmpty',
        'description'   => 'notEmpty',
        'correction'   => 'notEmpty',
        'keywords'   => 'notEmpty'
    ); 


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public $hasAndBelongsToMany = array(
		'Category' => array(
			'className' => 'Category',
			'joinTable' => 'posts_categories',
			'foreignKey' => 'post_id',
			'associationForeignKey' => 'category_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
	
	function beforeSave($options = array() )
    {
        if (empty($this->id))
        {
            $this->data[$this->name]['url'] = $this->getUniqueUrl($this->data[$this->name]['title'], 'url');
        }
		$this->data[$this->name]['user_id'] = CakeSession::read("Auth.User.id");;
       
        return true;
    } 


}
