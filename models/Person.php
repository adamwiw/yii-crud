<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persons".
 *
 * @property string $firstname
 * @property string $lastname
 * @property string $dob
 * @property string $zip
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persons';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'dob', 'zip'], 'required'],
            [['dob'], 'safe'],
            [['firstname', 'lastname'], 'string', 'max' => 60],
            [['zip'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'dob' => 'Dob',
            'zip' => 'Zip',
        ];
    }
}
