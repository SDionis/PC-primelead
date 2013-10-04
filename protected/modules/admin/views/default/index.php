<h2><?php $settings=Settings::model()->findByPk(1);
$partner_id=$settings->partner_id; 
if ($partner_id<2) 
{ echo "Для импорта новых купонов введите id партнера в разделе 'Настройки'";} 
 else
{  echo CHtml::link('Импортировать купоны', array('kupon/importcsv'));} ?> </h2>
