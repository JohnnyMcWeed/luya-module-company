<?php

namespace johnnymcweed\company\admin;

/**
 * Company Admin Module.
 *
 * File has been created with `module/create` command on LUYA version 1.0.0. 
 */
class Module extends \luya\admin\base\Module
{
    public $apis = [
        'api-company-company' => 'johnnymcweed\company\admin\apis\CompanyController',
        'api-company-companyplace' => 'johnnymcweed\company\admin\apis\CompanyplaceController',
        'api-company-people' => 'johnnymcweed\company\admin\apis\PeopleController',
    ];

    public function getMenu()
    {
        return (new \luya\admin\components\AdminMenuBuilder($this))
            ->node('Company', 'business')
            ->group('Group')
            ->itemApi('Company', 'companyadmin/company/index', 'business', 'api-company-company')
            ->itemApi('Company Places', 'companyadmin/companyplace/index', 'label', 'api-company-companyplace', ['hiddenInMenu' => true])
            ->itemApi('Company People', 'companyadmin/people/index', 'label', 'api-company-people', ['hiddenInMenu' => true]);
    }

    public static function onLoad()
    {
        self::registerTranslation('companyadmin', '@companyadmin/messages', [
            'companyadmin' => 'companyadmin.php',
        ]);
    }

    /**
     * Translat news messages.
     *
     * @param string $message
     * @param array $params
     * @return string
     */
    public static function t($message, array $params = [])
    {
        return parent::baseT('companyadmin', $message, $params);
    }
}