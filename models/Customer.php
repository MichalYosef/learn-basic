<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $phone_number
 */
class Customer extends \yii\db\ActiveRecord
{
    public function getNameAndSurname()
    {
        return $this->name.' '.$this->surname;
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname'], 'required'],
            [['name', 'surname', 'phone_number'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'phone_number' => 'Phone Number',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservation::className(), ['customer_id' => 'id']);
    }
    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRooms()
    {
        return $this->hasMany(Room::className(), ['id' => 'room_id'])->via('reservations');
    }        
    

    public function getReservationsCount()
    {
        return $this->hasMany(Reservation::className(), ['customer_id' => 'id'])->count();
    }
}
