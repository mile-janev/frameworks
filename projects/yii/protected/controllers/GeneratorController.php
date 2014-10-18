<?php

class GeneratorController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        public $game = array();

        /**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('user','post','comment'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        
        public function actionUser($type="S", $records=3)
        {
            for ($i=0; $i<$records; $i++) {
                $randomNumber = Generator::getRandomNumber(10);
                if ($type=="S") {
                    $user = new SUser();
                } else if ($type=="M") {
                    $user = new MUser();
                } else if ($type=="L") {
                    $user = new LUser();
                }
                $user->username = "u_".$randomNumber;
                $user->password = sha1("p_".$randomNumber);
                $user->firstname = Generator::getRandomString(8);
                $user->lastname = Generator::getRandomString(8);
                $user->save();
            }
        }
        
        public function actionPost($type='S', $records=3)
        {
            for ($i=0; $i<$records; $i++) {
                $criteria1 = new CDbCriteria();
                $criteria1->order = "RAND()";
                $criteria1->limit = 1;
                if ($type=="S") {
                    $user = SUser::model()->find($criteria1);
                    $post = new SPost();
                } else if ($type=="M") {
                    $user = MUser::model()->find($criteria1);
                    $post = new MPost();
                } else if ($type=="L") {
                    $user = LUser::model()->find($criteria1);
                    $post = new LPost();
                }
                
                $post->title = Generator::getRandomString(5) . ", " . Generator::getRandomString(10) . ".";
                $post->content = Generator::getRandomString(10) . ", " . Generator::getRandomString(8) . ", " . Generator::getRandomString(10) . ", " . Generator::getRandomString(7) . ".";
                $post->created = date('Y-m-d H:i:s',time());
                $post->user_id = $user->id;
                $post->save();
            }
        }
        
        public function actionComment($type='S', $records=3)
        {
            for ($i=0; $i<$records; $i++) {
                $criteria1 = new CDbCriteria();
                $criteria1->order = "RAND()";
                $criteria1->limit = 1;
                
                $criteria2 = new CDbCriteria();
                $criteria2->order = "RAND()";
                $criteria2->limit = 1;
                
                if ($type=="S") {
                    $user = SUser::model()->find($criteria1);
                    $post = SPost::model()->find($criteria2);
                    $comment = new SComment();
                } else if ($type=="M") {
                    $user = MUser::model()->find($criteria1);
                    $post = MPost::model()->find($criteria2);
                    $comment = new MComment();
                } else if ($type=="L") {
                    $user = LUser::model()->find($criteria1);
                    $post = LPost::model()->find($criteria2);
                    $comment = new LComment();
                }
                
                $comment->comment = Generator::getRandomString(10) . ", " . Generator::getRandomString(8) . ", " . Generator::getRandomString(10) . ".";
                $comment->created = date('Y-m-d H:i:s',time());
                $comment->user_id = $user->id;
                $comment->post_id = $post->id;
                $comment->save();
            }
        }
        
}