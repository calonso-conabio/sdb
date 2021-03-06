<?php

/**
 * This is the model class for table "materiales".
 *
 * The followings are the available columns in table 'materiales':
 * @property integer $id
 * @property string $nombre
 * @property string $ruta
 * @property string $formato
 * @property string $peso
 * @property string $fec_alta
 * @property string $fec_act
 * @property integer $semana_id
 *
 * The followings are the available model relations:
 * @property Semana $semana
 */
class Materiales extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Materiales the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'materiales';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, ruta, formato, peso, cadena, fec_alta, fec_act, semana_id', 'required'),
			array('semana_id', 'numerical', 'integerOnly'=>true),
			array('nombre, ruta, formato, peso', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, ruta, formato, peso, fec_alta, fec_act, semana_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'semana' => array(self::BELONGS_TO, 'Semana', 'semana_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'ruta' => 'Ruta',
			'formato' => 'Formato',
			'peso' => 'Peso',
			'fec_alta' => 'Fec Alta',
			'fec_act' => 'Fec Act',
			'semana_id' => 'Semana',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('ruta',$this->ruta,true);
		$criteria->compare('formato',$this->formato,true);
		$criteria->compare('peso',$this->peso,true);
		$criteria->compare('fec_alta',$this->fec_alta,true);
		$criteria->compare('fec_act',$this->fec_act,true);
		$criteria->compare('semana_id',$this->semana_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}