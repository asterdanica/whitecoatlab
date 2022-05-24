<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $description
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'description'], 'required'],
            [['name', 'email', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'description' => 'Description',
        ];
    }
}
