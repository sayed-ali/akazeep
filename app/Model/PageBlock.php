<?php
App::uses('AppModel', 'Model');
/**
 * PageBlock Model
 *
 * @property Post $Post
 */
class PageBlock extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'page_name, block_name';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'page_name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'post_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
