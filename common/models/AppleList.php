<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "apple_list".
 *
 * @property int $id
 * @property string|null $date_appearance
 * @property string|null $date_fall
 * @property int|null $status
 * @property float|null $eat
 * @property int|null $is_delete
 * @property string|null $color
 */
class AppleList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apple_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_appearance', 'date_fall'], 'safe'],
            [['status', 'is_delete'], 'integer'],
            [['eat'], 'number'],
            [['color'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_appearance' => 'Date Appearance',
            'date_fall' => 'Date Fall',
            'status' => 'Status',
            'eat' => 'Eat',
            'is_delete' => 'Is Delete',
            'color' => 'Color',
        ];
    }
}
