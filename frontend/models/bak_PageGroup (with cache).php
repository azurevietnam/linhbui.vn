<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "page_group".
 *
 * @property integer $id
 * @property string $name
 * @property string $route
 * @property string $url_regexp
 *
 * @property HtmlBox[] $htmlBoxes
 * @property HtmlBoxToPageGroup[] $htmlBoxToPageGroups
 * @property SeoInfo[] $seoInfos
 * @property SeoInfoToPageGroup[] $seoInfoToPageGroups
 * @property SeoInfo[] $seoInfos0
 * @property WidgetToPageGroup[] $widgetToPageGroups
 * @property Widget[] $widgets
 */
class PageGroup extends \common\models\PageGroup
{
    public static $_pertinent_records = 1;

    public static function pertinentRecords()
    {
        if (static::$_pertinent_records === 1) {
            $query = static::find();
            $query->where([
                'or',
                ['route' => Yii::$app->requestedRoute],
                ['route' => '*']
            ]);
            foreach (PageGroup::$all_url_params as $item) {
                $query->andWhere([
                    'or',
                    [
                        'or',
                        ['like', 'url_params', "\"{$item['name']}\":" . json_encode(Yii::$app->request->get($item['name'], ''))],
                        ['like', 'url_params', "\"{$item['name']}\":\"*\""],
                    ],
                    ['not like', 'url_params', "\"{$item['name']}\""],
                ]);
            }
            static::$_pertinent_records = $query->all();
        }
        return static::$_pertinent_records;
    }

    public static $_seo_info = 1;

    public static function seoInfo()
    {
        if (static::$_seo_info === 1) {
            $key = 'SeoInfo ' . Yii::$app->request->absoluteUrl;
            $data = Yii::$app->cache->get($key);
            if ($data === false || !Yii::$app->params['enable_cache']) {
                if (isset(static::pertinentRecords()[0])) {
                    $data = static::pertinentRecords()[0]->getSeoInfos()->oneActive();
                } else {
                    $data = false;
                }
                if ($data === false) {
                    $data = '_false';
                }
                Yii::$app->cache->set($key, $data, Yii::$app->params['cache_duration']);
            }
            
            if ($data === '_false') {
                static::$_seo_info = false;
            } else {
                static::$_seo_info = $data;
            }
        }
        return static::$_seo_info;
    }
    
    public static $_widgets = 1;
    
    public static function widgets()
    {
        if (static::$_widgets === 1) {
            $key = 'Widgets ' . Yii::$app->request->absoluteUrl;
            $data = Yii::$app->cache->get($key);
            if ($data === false || !Yii::$app->params['enable_cache']) {
                $data = [];
                foreach (static::pertinentRecords() as $item) {
                    $data = array_merge($data, $item->getWidgets()->allActive());
                }
                Yii::$app->cache->set($key, $data, Yii::$app->params['cache_duration']);
            }
            static::$_widgets = $data;
        }
        return static::$_widgets;
    }
    
    public static $_html_boxes = 1;
    
    public static function htmlBoxes()
    {
        if (static::$_html_boxes === 1) {
            $key = 'HtmlBoxes ' . Yii::$app->request->absoluteUrl;
            $data = Yii::$app->cache->get($key);
            if ($data === false || !Yii::$app->params['enable_cache']) {
                $data = [];
                foreach (static::pertinentRecords() as $item) {
                    $data = array_merge($data, $item->getHtmlBoxes()->allActive());
                }
                Yii::$app->cache->set($key, $data, Yii::$app->params['cache_duration']);
            }
            static::$_html_boxes = $data;
        }
        return static::$_html_boxes;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'route'], 'string', 'max' => 255],
            [['url_regexp', 'url_params'], 'string', 'max' => 2000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'route' => 'Route',
            'url_regexp' => 'Url Regexp',
            'url_params' => 'Url Params',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getHtmlBoxes()
    {
        return $this->hasMany(HtmlBox::className(), ['id' => 'html_box_id'])->viaTable('html_box_to_page_group', ['page_group_id' => 'id']);
//        return $this->hasMany(HtmlBox::className(), ['page_group_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getHtmlBoxToPageGroups()
    {
        return $this->hasMany(HtmlBoxToPageGroup::className(), ['page_group_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getSeoInfos()
    {
        return $this->hasMany(SeoInfo::className(), ['page_group_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getSeoInfoToPageGroups()
    {
        return $this->hasMany(SeoInfoToPageGroup::className(), ['page_group_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
//    public function getSeoInfos0()
//    {
//        return $this->hasMany(SeoInfo::className(), ['id' => 'seo_info_id'])->viaTable('seo_info_to_page_group', ['page_group_id' => 'id']);
//    }

    /**
     * @return ActiveQuery
     */
    public function getWidgetToPageGroups()
    {
        return $this->hasMany(WidgetToPageGroup::className(), ['page_group_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getWidgets()
    {
        return $this->hasMany(Widget::className(), ['id' => 'widget_id'])->viaTable('widget_to_page_group', ['page_group_id' => 'id']);
    }
}
