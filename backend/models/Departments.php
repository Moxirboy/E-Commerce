<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property int $id
 * @property int $branches_branch_id
 * @property string $department_name
 * @property int $companies_company_id
 * @property string $department_created_date
 * @property string $department_status
 *
 * @property Branches $branchesBranch
 * @property Companies $companiesCompany
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['branches_branch_id', 'department_name', 'companies_company_id', 'department_created_date', 'department_status'], 'required'],
            [['branches_branch_id', 'companies_company_id'], 'integer'],
            [['department_created_date'], 'safe'],
            [['department_status'], 'string'],
            [['department_name'], 'string', 'max' => 100],
            [['branches_branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branches::class, 'targetAttribute' => ['branches_branch_id' => 'id']],
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
            'branches_branch_id' => 'Branches Branch Name',
            'department_name' => 'Department Name',
            'companies_company_id' => 'Companies Company Name',
            'department_created_date' => 'Department Created Date',
            'department_status' => 'Department Status',
        ];
    }

    /**
     * Gets query for [[BranchesBranch]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBranchesBranch()
    {
        return $this->hasOne(Branches::class, ['id' => 'branches_branch_id']);
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
}
