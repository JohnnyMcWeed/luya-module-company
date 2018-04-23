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
            ->node('Companyplace', 'extension')
            ->group('Group')
            ->itemApi('Company', 'companyadmin/company/index', 'label', 'api-company-company')
            ->itemApi('Companyplace', 'companyadmin/companyplace/index', 'label', 'api-company-companyplace')
            ->itemApi('People', 'companyadmin/people/index', 'label', 'api-company-people');
    }
}