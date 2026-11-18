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
function formValue($name)
{
    if (isset($_POST[$name]) && is_string($_POST[$name])) {
        return $_POST[$name];
    }

    return '';
}
