<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Email\Test\TestCase;

use Magento\Mtf\TestCase\Injectable;
use Magento\Email\Test\Page\Adminhtml\EmailTemplateIndex;
use Magento\Email\Test\Page\Adminhtml\EmailTemplateNew;
use Magento\Email\Test\Fixture\EmailTemplate;

/**
 * Steps:
 * 1. Log in to Admin.
 * 2. Open the Email Templates page.
 * 3. Click the "Add New Template" button.
 * 4. Select Email Template.
 * 5. Click the "Load Template" button.
 * 6. Enter Email Template name.
 * 7. Click the "Save" button.
 * 8. Verify the email template saved successfully.
 * @group Email_(PS)
 * @ZephyrId MAGETWO-17155
 */

class CreateEmailTemplateEntityTest extends Injectable
{
    /* tags */
    const MVP = 'yes';
    const DOMAIN = 'PS';
    const TEST_TYPE = 'extended_acceptance_test';
    /* end tags */

    /**
     * Email Template Index page.
     *
     * @var EmailTemplateIndex
     */
    private $emailTemplateIndex;

    /**
     * New EmailTemplate page.
     *
     * @var EmailTemplateNew
     */
    private $emailTemplateNew;

    /**
     * Inject Email template pages.
     *
     * @param EmailTemplateIndex $EmailTemplateIndex
     * @param EmailTemplateNew $EmailTemplateNew
     * @return void
     */
    public function __inject(
        EmailTemplateIndex $EmailTemplateIndex,
        EmailTemplateNew $EmailTemplateNew
    ) {
        $this->emailTemplateIndex = $EmailTemplateIndex;
        $this->emailTemplateNew = $EmailTemplateNew;
    }

    /**
     * @param EmailTemplate $EmailTemplate
     */

    public function test(EmailTemplate $EmailTemplate)
    {
        $this->emailTemplateIndex->open();
        $this->emailTemplateIndex->getPageActionsBlock()->addNew();
        $this->emailTemplateNew->getTemplateForm()->fill($EmailTemplate);
        $this->emailTemplateNew->getTemplateForm()->clickLoadTemplate();
        $this->emailTemplateNew->getFormPageActions()->save();
    }
}