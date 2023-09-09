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
 * @property float|null $size
 */
class AppleList extends \yii\db\ActiveRecord
{
    const STATUS_AT_TREE = 0;
    const STATUS_FALL    = 10;
    const STATUS_ROTTEN  = -10;

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
            [['eat', 'size'], 'number'],
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
            'size' => 'Size',
        ];
    }

    public function getRandomColor()
    {
        $colors = [
            'green',
            'purple',
            'yellow',
        ];

        $rnd = mt_rand(0, count($colors) - 1);

        return $colors[$rnd];
    }

    public function saveRandom(){
        $this->color = $this->getRandomColor();
        $this->date_appearance = $this->randomDateInRange("-1 month");
        $this->date_fall = $this->randomDateInRange("-10 hour");
        $this->status = $this->getRandomStatus();
        return $this->save();
    }

    private function randomDateInRange($begin) {
        $start = strtotime(date("Y-m-d",strtotime($begin)));
        $end = strtotime(date("Y-m-d H:i:s"));
        $randomTimestamp = mt_rand($start, $end);
        return date("Y-m-d H:i:s",$randomTimestamp);
    }

    public function getRandomStatus(){
        $fallAt = new \DateTime($this->date_fall);
        $hoursOfFall = $fallAt->diff(new \DateTime())->h;
        if ($hoursOfFall > 5) {
            return self::STATUS_ROTTEN;
        }
        return array_rand([self::STATUS_AT_TREE,self::STATUS_FALL,self::STATUS_ROTTEN]);
    }
}
