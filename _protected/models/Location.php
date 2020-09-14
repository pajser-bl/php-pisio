<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property int $id
 * @property float|null $lat
 * @property float|null $lon
 * @property string|null $description
 * @property int $room_id
 * @property string|null $relativeLocation
 *
 * @property Asset[] $assets
 * @property Room $room
 * @property Transfer[] $transfers
 * @property Transfer[] $transfers0
 */
class Location extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    public $relativeLocation;

    public function getRelativeLocation()
    {
        return $this->relativeLocation = $this->room->name . ' at ' . $this->room->building->name;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['room_id'], 'required'],
            [['id', 'room_id'], 'integer'],
            [['lat', 'lon'], 'number'],
            [['description'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lat' => 'Lat',
            'lon' => 'Lon',
            'room_id' => 'Room ID',
            'relativelocation' => 'Location',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[Assets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssets()
    {
        return $this->hasMany(Asset::className(), ['location_id' => 'id']);
    }

    /**
     * Gets query for [[Room]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['id' => 'room_id']);
    }

    /**
     * Gets query for [[Transfers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransfers()
    {
        return $this->hasMany(Transfer::className(), ['location_from' => 'id']);
    }

    /**
     * Gets query for [[Transfers0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransfers0()
    {
        return $this->hasMany(Transfer::className(), ['location_to' => 'id']);
    }
}
