<?php


class CCommentList extends CWidget
{
    /**
     * @var mixed the data model whose details are to be displayed. This can be either a {@link CModel} instance
     * (e.g. a {@link CActiveRecord} object or a {@link CFormModel} object) or an associative array.
     */
    public $data;

    public $attributes;

    /**
     * @var string the name of the tag for rendering the detail view. Defaults to 'table'.
     * If set to null, no tag will be rendered.
     * @see itemTemplate
     */
    public $tagName = 'table';
    /**
     * @var string the template used to render a single attribute. Defaults to a table row.
     * These tokens are recognized: "{class}", "{label}" and "{value}". They will be replaced
     * with the CSS class name for the item, the label and the attribute value, respectively.
     * @see itemCssClass
     */
    public $itemTemplate = "<tr class=\"{class}\"><th>{label}</th><td>{value}</td></tr>\n";
    /**
     * @var array the CSS class names for the items displaying attribute values. If multiple CSS class names are given,
     * they will be assigned to the items sequentially and repeatedly.
     * Defaults to <code>array('odd', 'even')</code>.
     */
    public $itemCssClass = ['odd', 'even'];
    /**
     * @var array the HTML options used for {@link tagName}
     */
    public $htmlOptions = ['class' => 'detail-view'];

    /**
     * @var string the URL of the CSS file used by this detail view. Defaults to null, meaning using the integrated
     * CSS file. If this is set false, you are responsible to explicitly include the necessary CSS file in your page.
     */
    public $cssFile;

    /**
     * Initializes the detail view.
     * This method will initialize required property values.
     */
    public function init()
    {
        if ($this->data === null) {
            throw new CException(Yii::t('zii', 'Please specify the "data" property.'));
        }
        if ($this->attributes === null) {
            if ($this->data instanceof CModel) {
                $this->attributes = $this->data->attributeNames();
            } elseif (is_array($this->data)) {
                $this->attributes = array_keys($this->data);
            } else {
                throw new CException(Yii::t('zii', 'Please specify the "attributes" property.'));
            }
        }
    }

    /**
     * Renders the detail view.
     * This is the main entry of the whole detail view rendering.
     */
    public function run()
    {
        $dataProvider = new CActiveDataProvider('UserToComment');
        $dataProvider->setCriteria(
            [
            'condition' => 'user_id = :user_id',
            'params' => [':user_id'=> $this->data->id],
            'join' => 'LEFT JOIN user ON user.id = t.author_id',
            ]
        );

        $this->render(
            'application.widgets.view.comments', array(
            'dataProvider' => $dataProvider
            )
        );
    }

}
