function showPassword(element) {
    const container = element.parentNode;
    const passwordInput = container.querySelector('input');

    passwordInput.setAttribute("type", "text");
    container.querySelector('.connect-Space_form--password--eyeCloseSVG').style.display = 'block';
}

function hidePassword(element) {
    const container = element.parentNode;
    const passwordInput = container.querySelector('input');

    passwordInput.setAttribute("type", "password");
    container.querySelector('.connect-Space_form--password--eyeCloseSVG').style.display = 'none';
}