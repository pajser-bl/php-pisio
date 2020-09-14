<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "transfer".
 *
 * @property integer $id
 * @property string $date
 * @property integer $asset
 * @property integer $person_from
 * @property integer $person_to
 * @property integer $location_from
 * @property integer $location_to
 *
 * @property \app\models\Asset $asset0
 * @property \app\models\Location $locationFrom
 * @property \app\models\Location $locationTo
 * @property \app\models\Person $personFrom
 * @property \app\models\Person $personTo
 */
class Transfer extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    private $_rt_softdelete;
    private $_rt_softrestore;

    public function __construct(){
        parent::__construct();
        $this->_rt_softdelete = [
            'deleted_by' => \Yii::$app->user->id,
            'deleted_at' => date('Y-m-d H:i:s'),
        ];
        $this->_rt_softrestore = [
            'deleted_by' => 0,
            'deleted_at' => date('Y-m-d H:i:s'),
        ];
    }

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'asset0',
            'locationFrom',
            'locationTo',
            'personFrom',
            'personTo'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'date', 'asset'], 'required'],
            [['id', 'asset', 'person_from', 'person_to', 'location_from', 'location_to'], 'integer'],
            [['date'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transfer';
    }

    /**
     *
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock
     *
     */
    public function optimisticLock() {
        return 'lock';
    }

    /**
     * @inheritdoc
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
     * @return \yii\db\ActiveQuery
     */
    public function getAsset0()
    {
        return $this->hasOne(\app\models\Asset::className(), ['id' => 'asset']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocationFrom()
    {
        return $this->hasOne(\app\models\Location::className(), ['id' => 'location_from']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocationTo()
    {
        return $this->hasOne(\app\models\Location::className(), ['id' => 'location_to']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonFrom()
    {
        return $this->hasOne(\app\models\Person::className(), ['id' => 'person_from']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonTo()
    {
        return $this->hasOne(\app\models\Person::className(), ['id' => 'person_to']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }

    /**
     * The following code shows how to apply a default condition for all queries:
     *
     * ```php
     * class Customer extends ActiveRecord
     * {
     *     public static function find()
     *     {
     *         return parent::find()->where(['deleted' => false]);
     *     }
     * }
     *
     * // Use andWhere()/orWhere() to apply the default condition
     * // SELECT FROM customer WHERE `deleted`=:deleted AND age>30
     * $customers = Customer::find()->andWhere('age>30')->all();
     *
     * // Use where() to ignore the default condition
     * // SELECT FROM customer WHERE age>30
     * $customers = Customer::find()->where('age>30')->all();
     * ```
     */

    /**
     * @inheritdoc
     * @return \app\models\TransferQuery the active query used by this AR class.
     */
    public static function find()
    {
        $query = new \app\models\TransferQuery(get_called_class());
        return $query->where(['transfer.deleted_by' => 0]);
    }
}
