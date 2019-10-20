<?php

namespace app\jobs;

use Yii;
use yii\base\BaseObject;
use yii\queue\JobInterface;
use yii\queue\Queue;

/**
 * Class SendEmailJob
 * @package app\jobs
 */
class SendEmailJob extends BaseObject implements JobInterface
{
    /**
     * @var string $email
     */
    public $email;
    /**
     * @var string $password
     */
    public $password;
    /**
     * @param Queue $queue which pushed and is handling the job
     * @return void|mixed result of the job execution
     */
    public function execute($queue)
    {
        Yii::$app->mailer->compose()
            ->setTo($this->email)
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setSubject(Yii::t('app', 'You have successfully registered!'))
            ->setTextBody(Yii::t('app', 'You have successfully registered! Your password: ') . $this->password)
            ->send();
    }
}