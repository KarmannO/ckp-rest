<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organizations".
 *
 * @property integer $id
 * @property string $full_name
 * @property string $short_name
 * @property string $fano_num
 * @property integer $post_code
 * @property string $post_address
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organizations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_code'], 'integer'],
            [['full_name'], 'string', 'max' => 255],
            [['short_name', 'fano_num'], 'string', 'max' => 64],
            [['post_address'], 'string', 'max' => 300],
            [['full_name'], 'unique'],
            [['fano_num'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'short_name' => 'Short Name',
            'fano_num' => 'Fano Num',
            'post_code' => 'Post Code',
            'post_address' => 'Post Address',
        ];
    }
}
