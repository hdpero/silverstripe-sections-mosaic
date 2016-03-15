<?php
/**
 *
 *
 * @package silverstripe
 * @subpackage sections
 */
class MosaicSection extends Section
{
    private static $title = "Mosaic Section";

    private static $description = "";

    /**
     * Has_many relationship
     * @var array
     */
    private static $many_many = array(
        "MosaicImages" => "mosaicSectionImage"
    );

    /**
     * {@inheritdoc }
     * @var array
     */
    private static $many_many_extraFields = array(
        "MosaicImages" => array(
            "Sort" => "Int"
        )
    );

    /**
     * CMS Fields
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $mosaicGridConfig = GridFieldConfig_RelationEditor::create();
        if ($this->mosaicImages()->Count() > 0) {
            $mosaicGridConfig->addComponent(new GridFieldOrderableRows());
        }

        $fields->addFieldToTab(
            'Root.Main',
            GridField::create(
                'MosaicImages',
                'Mosaic Images',
                $this->MosaicImages(),
                $mosaicGridConfig
            )
        );
        return $fields;
    }
}
