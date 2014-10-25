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
				'actions'=>array('user','post','comment','postFast'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        
        public function actionUser($type="L", $records=200000)
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
            
            echo "Finished";
        }
        
        public function actionPost($type='L', $records=1000000)
        {
            for ($i=0; $i<$records; $i++) {
                $criteria1 = null;
                $user = null;
                $post = null;
                
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
            
            echo "Finished";
        }
        
        /*Importing posts on faster way*/
        public function actionPostFast($end=200000)
        {
            $total = LPost::model()->count();
            $i = $total+1;//Start from here
            
            $title = Generator::getRandomString(5) . ", " . Generator::getRandomString(10) . ".";
            $content = Generator::getRandomString(10) . ", " . Generator::getRandomString(8) . ", " . Generator::getRandomString(10) . ", " . Generator::getRandomString(7) . ".";
            
            for ($i; $i<=$end; $i++) {
                $criteria1 = null;
                $user = null;
                $post = null;
                
                $post = new LPost();
                $post->id = $i;
                $post->title = $i . "- " . $title;
                $post->content = $i . "- " . $content;
                $post->created = date('Y-m-d H:i:s',time());
                if ($i>200000 && $i<=400000) {
                    $post->user_id = $i-200000;
                } else if ($i>400000 && $i<=600000) {
                    $post->user_id = $i-400000;
                } else if ($i>600000 && $i<=800000) {
                    $post->user_id = $i-600000;
                } else if ($i>800000 && $i<=1000000) {
                    $post->user_id = $i-800000;
                } else {
                    $post->user_id = $i;
                }
                
                if ($i>1000000) {
                    var_dump("Finished");
                    exit();
                }
                $post->save();
            }
            
            echo "Finished";
        }
        
        public function actionComment($type='M', $records=200)
        {
            for ($i=0; $i<$records; $i++) {
                $criteria1 = null;
                $user = null;
                $post = null;
                $comment = null;
                
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
            
            echo "Finished";
        }
        
}