<?php
namespace app\index\validate;

use think\Validate;

class Dictionary extends Validate
{
    protected $rule = [
		'id'  =>  'require|number',
		'word'  =>  'max:30',
		'explanation'  =>  'max:255'
    ];
	
	protected $scene=[
		'add'  =>  ['word','explanation'],
		'edit'  =>  ['id','word','explanation'],
		'del'	=>['id'],
		'state'	=>['id'],
	];
}