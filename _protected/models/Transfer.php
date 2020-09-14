<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transfer".
 *
 * @property int $id
 * @property string $date
 * @property int $asset
 * @property int|null $person_from
 * @property int|null $person_to
 * @property int|null $location_from
 * @property int|null $location_to
 *
 * @property Asset $asset0
 * @property Location $locationFrom
 * @property Location $locationTo
 * @property Person $personFrom
 * @property Person $personTo
 */
class Transfer extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transfer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'asset'], 'required'],
            [['id', 'asset', 'person_from', 'person_to', 'location_from', 'location_to'], 'integer'],
            [['date'], 'safe'],
            [['id'], 'unique'],
            [['asset'], 'exist', 'skipOnError' => true, 'targetClass' => Asset::className(), 'targetAttribute' => ['asset' => 'id']],
            [['location_from'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['location_from' => 'id']],
            [['location_to'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['location_to' => 'id']],
            [['person_from'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_from' => 'id']],
            [['person_to'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_to' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'asset' => 'Asset',
            'person_from' => 'Person From',
            'person_to' => 'Person To',
            'location_from' => 'Location From',
            'location_to' => 'Location To',
        ];
    }

    /**
     * Gets query for [[Asset0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAsset0()
    {
        return $this->hasOne(Asset::className(), ['id' => 'asset']);
    }

    /**
     * Gets query for [[LocationFrom]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocationFrom()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_from']);
    }

    /**
     * Gets query for [[LocationTo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocationTo()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_to']);
    }

    /**
     * Gets query for [[PersonFrom]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonFrom()
    {
        return $this->hasOne(Person::className(), ['id' => 'person_from']);
    }

    /**
     * Gets query for [[PersonTo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonTo()
    {
        return $this->hasOne(Person::className(), ['id' => 'person_to']);
    }
}
