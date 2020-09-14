<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property int $id
 * @property string $lastname
 * @property string $firstname
 * @property string $employment
 * @property string|null $title
 * @property string|null $fullName
 *
 * @property Asset[] $assets
 * @property Transfer[] $transfers
 * @property Transfer[] $transfers0
 */
class Person extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;
    public $fullName;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lastname', 'firstname', 'employment'], 'required'],
            [['id'], 'integer'],
            [['lastname', 'firstname', 'employment'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 45],
            [['id'], 'unique'],
        ];
    }

    public function getFullName()
    {
        return $this->fullName = $this->firstname . ' ' . $this->lastname;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lastname' => 'Lastname',
            'firstname' => 'Firstname',
            'employment' => 'Employment',
            'title' => 'Title',
            'fullName' => 'Full Name'
        ];
    }

    /**
     * Gets query for [[Assets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssets()
    {
        return $this->hasMany(Asset::className(), ['person_id' => 'id']);
    }

    /**
     * Gets query for [[Transfers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransfers()
    {
        return $this->hasMany(Transfer::className(), ['person_from' => 'id']);
    }

    /**
     * Gets query for [[Transfers0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransfers0()
    {
        return $this->hasMany(Transfer::className(), ['person_to' => 'id']);
    }
}
