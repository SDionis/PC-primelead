<?php
/* @var $this ShopController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Shops',
);

$this->menu=array(
	array('label'=>'Create Shop', 'url'=>array('create')),
	array('label'=>'Manage Shop', 'url'=>array('admin')),
);
?>
<div id="shop_wraper">
<div class="entry">
<h1>Магазины</h1>
<hr>
<table class="alfav" id="alf">
<tbody>
<tr>
<td><a style="border:none;" href="#0">0-9</a><a href="#A">A</a><a href="#B">B</a><a href="#C">C</a><a href="#D">D</a><a href="#E">E</a><a href="#F">F</a><a href="#G">G</a><a href="#H">H</a><a href="#I">I</a><a href="#J">J</a><a href="#K">K</a><a href="#L">L</a><a href="#M">M</a><a href="#N">N</a><a href="#O">O</a><a href="#P">P</a><a href="#Q">Q</a><a href="#R">R</a><a href="#S">S</a><a href="#T">T</a><a href="#V">V</a><a style="border:none;" href="#W">W</a><a href="#Y">Y</a><a href="#Z">Z</a><a href="#А">А</a><a href="#Б">Б</a><a href="#В">В</a><a href="#Г">Г</a><a href="#Д">Д</a><a href="#Е">Е</a><a href="#Ж">Ж</a><a href="#З">З</a><a href="#И">И</a><a href="#К">К</a><a href="#Л">Л</a><a href="#М">М</a><a href="#Н">Н</a><a href="#О">О</a><a href="#П">П</a><a href="#Р">Р</a><a href="#С">С</a><a href="#Т">Т</a><a href="#У">У</a><a style="border:none;" href="#Ф">Ф</a><a href="#Х">Х</a><a href="#Ц">Ц</a><a href="#Ч">Ч</a><a href="#З">Э</a><a href="#Ю">Ю</a><a href="#Я">Я</a></td>
</tr>
</tbody>
</table>
<hr>
<div id="shops-page">
<?php
foreach(range(0,9) as $b)
{
$Criteria = new CDbCriteria();
$Criteria->condition = "name LIKE '$b%'";
$Criteria->order = "name ASC";
$shops = shop::model()->findAll($Criteria);
if (!empty($shops))
{
echo "<a name='$b'></a><br><b> $b </b><p></p>";
foreach ($shops AS $shop_element)
{
$base_url=Yii::app()->request->baseUrl;
$image=$shop_element->image;
echo "<p><a class='invarseColor' title='$shop_element->name' href='$base_url/shop/$shop_element->translit_url'  target='_blank'><span class='mgs'>$shop_element->name</span>
<img alt='$shop_element->name' src='$base_url/images/$image'></a>   ";}
echo "</p><hr>";
}}
foreach (range(chr(0xC0), chr(0xDF)) as $b)
{
$b=iconv('CP1251', 'UTF-8', $b);
$Criteria = new CDbCriteria();
$Criteria->condition = "name LIKE '$b%'";
$Criteria->order = "name ASC";
$shops = shop::model()->findAll($Criteria);
if (!empty($shops))
{

echo "<a name='$b'></a><br><b> $b </b><p></p>";
foreach ($shops AS $shop_element)
{
$base_url=Yii::app()->request->baseUrl;
$image=$shop_element->image;
echo "<p><a class='invarseColor' title='$shop_element->name' href='$base_url/shop/$shop_element->translit_url' target='_blank'><span class='mgs'>$shop_element->name</span>
<img alt='$shop_element->name' src='$base_url/images/$image'></a>   ";}
echo "</p><hr>";
}}
foreach(range('A','Z') as $b)
{
$Criteria = new CDbCriteria();
$Criteria->condition = "name LIKE '$b%'";
$Criteria->order = "name ASC";
$shops = shop::model()->findAll($Criteria);
if (!empty($shops))
{
echo "<a name='$b'></a><br><b> $b </b><p></p>";
foreach ($shops AS $shop_element)
{
$base_url=Yii::app()->request->baseUrl;
$image=$shop_element->image;
echo "<p><a class='invarseColor' title='$shop_element->name' href='$base_url/shop/$shop_element->translit_url'  target='_blank'><span class='mgs'>$shop_element->name</span>
<img alt='$shop_element->name' src='$base_url/images/$image'></a>   ";}
echo "</p><hr>";
}}?>
</div>
</div>
</div>

