<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "branches".
 *
 * @property int $id
 * @property int $companies_company_id
 * @property string $branch_name
 * @property string $branch_address
 * @property string $branch_created_date
 * @property string $branch_status
 *
 * @property Companies $companiesCompany
 * @property Departments[] $companies
 */
class Branches extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'branches';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['companies_company_id', 'branch_name', 'branch_address', 'branch_created_date', 'branch_status'], 'required'],
            [['companies_company_id'], 'integer'],
            [['branch_created_date'], 'safe'],
            [['branch_status'], 'string'],
            [['branch_name'], 'string', 'max' => 100],
            [['branch_address'], 'string', 'max' => 255],
            [['companies_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::class, 'targetAttribute' => ['companies_company_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'companies_company_id' => 'Companies Name',
            'branch_name' => 'Branch Name',
            'branch_address' => 'Branch Address',
            'branch_created_date' => 'Branch Created Date',
            'branch_status' => 'Branch Status',
        ];
    }

    /**
     * Gets query for [[CompaniesCompany]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompaniesCompany()
    {
        return $this->hasOne(Companies::class, ['id' => 'companies_company_id']);
    }

    /**
     * Gets query for [[Departments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Departments::class, ['branches_branch_id' => 'id']);
    }
}