<?php
namespace App\SCORPIO;
class SCORPIO_Const {
        // Define password
        const PASSWORD_DEFAULT = "123456";
        // Define Path guide link
        const STEP_GUIDE_UPLOAD = 'upload/guides/step';
        const TEMP_IMAGES = 'temp_images/';
        const ALL_IMAGES = 'images/';
        const ALLOWED_IMGTYPE = ['jpg', 'png', 'doc', 'gif'];
        const ALLOWED_DOCTYPE = ['txt', 'docx', 'doc', 'pdf', 'xls', 'xlsx', 'rtf'];
        const ALLOWED_DOCSIZE = 10485760;
}
