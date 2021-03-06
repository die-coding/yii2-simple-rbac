<?php

namespace juliardi\simplerbac\models;

/**
 * This is the model class for table "rbac_role".
 *
 * @property int $id
 * @property string $name
 * @property RbacAccessRules[] $rbacAccessRules
 */
class RbacRole extends \juliardi\simplerbac\base\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rbac_role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 20],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRbacAccessRules()
    {
        return $this->hasMany(RbacAccessRules::className(), ['role_id' => 'id']);
    }
}
