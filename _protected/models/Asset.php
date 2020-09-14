<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asset".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $status
 * @property string|null $type
 * @property string $acquired
 * @property float $price
 * @property float $amortization
 * @property int $person_id
 * @property int $location_id
 *
 * @property Location $location
 * @property Person $person
 * @property Transfer[] $transfers
 */
class Asset extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'acquired', 'person_id', 'location_id', 'price', 'amortization','status'], 'required'],
            [['id', 'person_id', 'location_id'], 'integer'],
            [['acquired'], 'safe'],
            [['price', 'amortization'], 'number'],
            [['name', 'status', 'type'], 'string', 'max' => 45],
            [['description'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['location_id' => 'id']],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_id' => 'id']],
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
            'description' => 'Description',
            'status' => 'Status',
            'type' => 'Type',
            'acquired' => 'Acquired',
            'price' => 'Price',
            'amortization' => 'Amortization',
            'person_id' => 'Person ID',
            'location_id' => 'Location ID',
        ];
    }

    /**
     * Gets query for [[Location]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }

    /**
     * Gets query for [[Person]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }

    /**
     * Gets query for [[Transfers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransfers()
    {
        return $this->hasMany(Transfer::className(), ['asset' => 'id']);
    }
}
