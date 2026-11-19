function PasswordToggle() {
    const [visible, setVisible] = React.useState(false);

    function togglePassword() {
        const fields = document.querySelectorAll('input[autocomplete$="password"]');
        for (const field of fields) {
            field.type = visible ? 'password' : 'text';
        }
        setVisible(!visible);
    }

    return React.createElement('button', {
        type: 'button',
        className: 'password-toggle',
        'aria-pressed': visible,
        onClick: togglePassword
    }, visible ? 'Hide password' : 'Show password');
}

if (window.React && window.ReactDOM) {
    const root = ReactDOM.createRoot(document.getElementById('password-toggle'));
    root.render(React.createElement(PasswordToggle));
}
