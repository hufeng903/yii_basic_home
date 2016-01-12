<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property string $cid
 * @property string $parent_cid
 * @property string $name
 * @property integer $is_parent
 * @property string $sort_order
 * @property integer $status
 * @property string $features
 *
 * @property Product[] $products
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid', 'parent_cid', 'name', 'is_parent', 'sort_order', 'status'], 'required'],
            [['cid', 'parent_cid', 'is_parent', 'sort_order', 'status'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['features'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cid' => 'Cid',
            'parent_cid' => 'Parent Cid',
            'name' => 'Name',
            'is_parent' => 'Is Parent',
            'sort_order' => 'Sort Order',
            'status' => 'Status',
            'features' => 'Features',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['cid' => 'cid']);
    }
}
