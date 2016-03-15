<?php
/**
 *
 *
 * @package silverstripe
 * @subpackage sections
 */
class MosaicSectionImage extends DataObject
{
    /**
     * Singular name for CMS
     * @var string
     */
    private static $singular_name = 'MosaicSectionImage';

    /**
     * Plural name for CMS
     * @var string
     */
    private static $plural_name = 'MosaicSectionImages';

    /**
     * Database fields
     * @var array
     */
    private static $db = array(
        "AdminTitle" => "Varchar(50)",
        "Status" => "Boolean",
        "Caption" => "Text",
        "FancyboxEnabled" => "Boolean"
    );

    /**
     * Has_one relationship
     * @var array
     */
    private static $has_one = array(
        "Image" => "Image"
    );

    /**
     * Many_many relationship
     * @var array
     */
    // private static $many_many = array(
    //     "Links" => "Link"
    // );

    /**
     * {@inheritdoc }
     * @var array
     */
    // private static $many_many_extraFields = array(
    //     'Links' => array(
    //         'Sort' => 'Int'
    //     )
    // );

    private static $summary_fields = array(
        "Image.CMSThumbnail" => "Image",
        "AdminTitle" => "Title",
        "NiceStatus" => "Status",
        "Width" => "Image Width"
    );

    /**
     * CMS Fields
     * @return FieldList
     */
    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->addFieldsToTab(
            "Root.Main",
            array(
                OptionsetField::create(
                    'Status',
                    'Status',
                    array(
                        "1" => "Active",
                        "0" => "Disabled"
                    ),
                    1
                ),
                TextField::create(
                    'AdminTitle'
                )
                ->setDescription('This field is for adminisration use only and will not display on the site.'),
                TextField::create(
                    'Caption',
                    'Caption'
                ),
                UploadField::create(
                    'Image',
                    'Image'
                )->setFolderName('MosaicImages'),
                OptionsetField::create(
                    'FancyboxEnabled',
                    'Add Fancybox link for this image?',
                    array(
                        "1" => "Enabled",
                        "0" => "Disabled"
                    ),
                    1
                )
            )
        );
        return $fields;
    }

    /**
     * Viewing Permissions
     * @return boolean
     */
    public function canView($member = null)
    {
        return Permission::check('EDIT_SECTIONS', 'any', $member);
    }

    /**
     * Editing Permissions
     * @return boolean
     */
    public function canEdit($member = null)
    {
        return Permission::check('EDIT_SECTIONS', 'any', $member);
    }

    /**
     * Deleting Permissions
     * @return boolean
     */
    public function canDelete($member = null)
    {
        return Permission::check('EDIT_SECTIONS', 'any', $member);
    }

    /**
     * Creating Permissions
     * @return boolean
     */
    public function canCreate($member = null)
    {
        return Permission::check('EDIT_SECTIONS', 'any', $member);
    }

    public function getNiceStatus() {
        return ($this->Status == 1 ? "Active" : "Disabled");
    }

}
