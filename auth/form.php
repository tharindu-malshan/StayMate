// include the session file
<?php
    require_once __DIR__ . '/../includes/session.php';

//Make text safe to display
    function escape($value)
{
    return htmlspecialchars(
        (string)$value,
        ENT_QUOTES | ENT_SUBSTITUTE,
        'UTF-8'
    );
}
//Get value from form. 
function formValue($name)
{
    if (isset($_POST[$name]) && is_string($_POST[$name])) {
        return $_POST[$name];
    }

    return '';
}
// Check if the form submission is valid or not
function checkForm()
{
    // Check whether the form uses POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Allow: POST');
        http_response_code(405);
        exit('Please open the form first.');
    }

    // Check the CSRF security token
    if (!hash_equals($_SESSION['csrf_token'], formValue('csrf_token'))) {
        http_response_code(403);
        exit('Please go back, refresh the form and try again.');
    }
}