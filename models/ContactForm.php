<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $lastname;
    public $email;
    public $phone;
    public $city;
    public $subject;
    public $body;
    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'lastname', 'email', 'phone', 'city', 'body'], 'required'],
            // email has to be a valid email address
            [['phone'], 'integer', 'integerOnly'=>true, 'min'=>100000, 'max'=>9999999999],
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            //['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
            'name'=>'Nombres',
            'lastname'=>'Apellidos',
            'email'=>'Email',
            'phone'=>'Teléfono',
            'city'=>'Ciudad',
            'body'=>'Comentario',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string  $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            $mail=Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                // ->setSubject($this->subject)
                ->setSubject('Contacto Mosaico')
                ->setTextBody($this->body);
            if($mail->send()){
                return 'enviado';
            }
            else{
                return 'no enviado';
            }
        } else {
            return array_values($this->getFirstErrors())[0];
        }
    }
}
